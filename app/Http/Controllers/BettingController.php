<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fixture;
use App\Odds;
use App\Bet;
use App\Users;
use Session;

class BettingController extends Controller
{
    public function footballPage()
    {
        if (!Session::get('user_id')) {
            return redirect(url('login'));
        }
        return view('football');
    }

    public function hockeyPage()
    {
        if (!Session::get('user_id')) {
            return redirect(url('login'));
        }
        return view('hockey');
    }

    public function basketballPage()
    {
        if (!Session::get('user_id')) {
            return redirect(url('login'));
        }
        return view('basketball');
    }

    public function boxingPage()
    {
        if (!Session::get('user_id')) {
            return redirect(url('login'));
        }
        return view('boxing');
    }

    public function americanFootballPage()
    {
        if (!Session::get('user_id')) {
            return redirect(url('login'));
        }
        return view('american-football');
    }

    public function getFixtures(Request $request)
    {
        $sport = $request->get('sport', 'football');
        $status = $request->get('status', 'upcoming');

        try {
            if ($sport === 'football') {
                return response()->json($this->getMockFixtures($sport));
            }

            $query = Fixture::where('sport', $sport)->with('odds')->orderBy('kickoff_time', 'asc');

            if ($status !== 'all') {
                $query->where('status', $status);
            }

            $fixtures = $query->get();

            if ($fixtures->isEmpty()) {
                return response()->json($this->getMockFixtures($sport));
            }

            return response()->json($fixtures);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json($this->getMockFixtures($sport));
        } catch (\Exception $e) {
            return response()->json($this->getMockFixtures($sport));
        }
    }

    public function placeBet(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $fixtureId = $request->input('fixture_id');
        $market = $request->input('market');
        $selection = $request->input('selection');
        $stake = $request->input('stake', 10);
        $odds = $request->input('odds');

        $fixture = Fixture::find($fixtureId);
        if (!$fixture) {
            return response()->json(['error' => 'Fixture not found'], 404);
        }

        $potentialReturn = $stake * $odds;

        $bet = Bet::create([
            'user_id' => $userId,
            'fixture_id' => $fixtureId,
            'market' => $market,
            'selection' => $selection,
            'stake' => $stake,
            'odds' => $odds,
            'potential_return' => $potentialReturn,
            'status' => 'pending',
        ]);

        return response()->json(['success' => 'Bet placed', 'bet' => $bet]);
    }

    public function getBetSlip(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $bets = Bet::where('user_id', $userId)
            ->whereIn('status', ['pending', 'submitted', 'won', 'lost'])
            ->with('fixture')
            ->get();

        $activeBets = $bets->filter(function ($bet) {
            return in_array($bet->status, ['pending', 'submitted']);
        });

        $totalStake = $activeBets->sum('stake');
        $totalOdds = 1;

        foreach ($activeBets as $bet) {
            $totalOdds *= $bet->odds;
        }

        $totalReturn = $totalStake * $totalOdds;
        $congratulations = [];

        foreach ($bets as $bet) {
            $fixtureData = $bet->fixture ? $bet->fixture->toArray() : null;
            if (!$fixtureData || ($bet->fixture && $bet->fixture->sport === 'football')) {
                $fixtureData = $this->getFootballFixtureById($bet->fixture_id);
            }

            $evaluation = $this->evaluateBetAgainstFixture($bet, $fixtureData);

            if ($bet->status !== $evaluation['status'] && in_array($evaluation['status'], ['won', 'lost'])) {
                $bet->update(['status' => $evaluation['status']]);
            }

            $bet->status = $evaluation['status'];
            $bet->result_message = $evaluation['message'];

            if ($evaluation['status'] === 'won') {
                $congratulations[] = $bet->result_message;
            }
        }

        return response()->json([
            'bets' => $bets,
            'total_stake' => round($totalStake, 2),
            'total_odds' => round($totalOdds, 2),
            'total_return' => round($totalReturn, 2),
            'count' => $activeBets->count(),
            'congratulations' => $congratulations,
        ]);
    }

    public function removeBet(Request $request)
    {
        $userId = Session::get('user_id');
        $betId = $request->input('bet_id');

        Bet::where('id', $betId)->where('user_id', $userId)->delete();

        return response()->json(['success' => 'Bet removed']);
    }

    public function submitBetSlip(Request $request)
    {
        $userId = Session::get('user_id');
        $bets = Bet::where('user_id', $userId)->where('status', 'pending')->get();

        if ($bets->isEmpty()) {
            return response()->json(['error' => 'No bets in slip'], 400);
        }

        foreach ($bets as $bet) {
            $bet->update(['status' => 'submitted']);
        }

        return response()->json(['success' => 'Bet slip submitted']);
    }

    private function getMockFixtures($sport = 'football')
    {
        if ($sport === 'football') {
            return $this->getFootballFixtures();
        }

        $fixtures = [];
        $leagues = ['Domestic League', 'International Cup', 'Friendly'];
        $statusTeams = [
            'upcoming' => [
                ['Team A', 'Team B'],
                ['Team C', 'Team D'],
                ['Team E', 'Team F'],
                ['Team G', 'Team H'],
                ['Team I', 'Team J'],
                ['Team K', 'Team L'],
                ['Team M', 'Team N'],
                ['Team O', 'Team P'],
                ['Team Q', 'Team R'],
                ['Team S', 'Team T'],
            ],
            'live' => [
                ['Team U', 'Team V'],
                ['Team W', 'Team X'],
                ['Team Y', 'Team Z'],
                ['Team AA', 'Team BB'],
                ['Team CC', 'Team DD'],
                ['Team EE', 'Team FF'],
                ['Team GG', 'Team HH'],
                ['Team II', 'Team JJ'],
                ['Team KK', 'Team LL'],
                ['Team MM', 'Team NN'],
            ],
            'finished' => [
                ['Team OO', 'Team PP'],
                ['Team QQ', 'Team RR'],
                ['Team SS', 'Team TT'],
                ['Team UU', 'Team VV'],
                ['Team WW', 'Team XX'],
                ['Team YY', 'Team ZZ'],
                ['Team AAA', 'Team BBB'],
                ['Team CCC', 'Team DDD'],
                ['Team EEE', 'Team FFF'],
                ['Team GGG', 'Team HHH'],
            ],
        ];

        $statuses = ['upcoming', 'live', 'finished'];
        $idx = 1;

        foreach ($statuses as $status) {
            for ($i = 0; $i < 10; $i++) {
                $pair = $statusTeams[$status][$i];
                if ($status === 'upcoming') {
                    $kickoffTime = date('Y-m-d H:i:s', strtotime('+' . ($i + 1) . ' hours'));
                    $homeScore = null;
                    $awayScore = null;
                } elseif ($status === 'live') {
                    $kickoffTime = date('Y-m-d H:i:s', strtotime('-' . rand(5, 55) . ' minutes'));
                    $homeScore = rand(0, 5);
                    $awayScore = rand(0, 5);
                } else {
                    $kickoffTime = date('Y-m-d H:i:s', strtotime('-' . rand(70, 180) . ' minutes'));
                    $homeScore = rand(0, 6);
                    $awayScore = rand(0, 6);
                }

                $odds = [
                    ['id' => $idx * 3 + 1, 'fixture_id' => $idx, 'market' => '1x2', 'selection' => '1', 'odds_value' => round(rand(150, 250) / 100, 2)],
                    ['id' => $idx * 3 + 2, 'fixture_id' => $idx, 'market' => '1x2', 'selection' => 'X', 'odds_value' => round(rand(300, 380) / 100, 2)],
                    ['id' => $idx * 3 + 3, 'fixture_id' => $idx, 'market' => '1x2', 'selection' => '2', 'odds_value' => round(rand(220, 450) / 100, 2)],
                ];

                $fixtures[] = [
                    'id' => $idx,
                    'sport' => $sport,
                    'league' => $leagues[$i % count($leagues)],
                    'home_team' => $pair[0],
                    'away_team' => $pair[1],
                    'kickoff_time' => $kickoffTime,
                    'status' => $status,
                    'home_score' => $homeScore,
                    'away_score' => $awayScore,
                    'odds' => $odds,
                ];

                $idx++;
            }
        }

        return $fixtures;
    }

    private function getFootballFixtures($status = 'all')
    {
        $teamPairs = [
            ['Sacachispas', 'Berazategui'],
            ['Chacarita Juniors Reserve', 'Deportivo Morón Reserve'],
            ['Colegiales Reserve', 'CA Estudiantes Caseros Reserves'],
            ['Club Almagro Reserve', 'Atlanta Reserve'],
            ['Estudiantes R', 'Rivadavia R'],
            ['Gimnasia De Mendoza Reserve', 'Gimnasia y Esgrima R'],
            ['Instituto Cordoba R', 'Atlético Tucumán R'],
            ['Rosario Central R', 'Racing R'],
            ['Platense Reserve', 'Lanús Reserve'],
            ['Talleres Reserve', 'Sarmiento Reserve'],
            ['Barracas Central', 'San Martin'],
            ['Quilmes', 'Defensa y Justicia'],
            ['Velez Sarsfield', 'Union Santa Fe'],
        ];

        $leagues = ['Premier League', 'La Liga', 'Serie A', 'Bundesliga', 'Ligue 1', 'MLS', 'Eredivisie'];
        $matchDuration = 105 * 60;
        $startOfDay = strtotime(date('Y-m-d 00:00:00'));
        $now = time();

        $fixtures = [];

        for ($i = 0; $i < 13; $i++) {
            $matchStart = $startOfDay + ($i * $matchDuration);
            $elapsed = $now - $matchStart;
            $status = $this->getFootballMatchStatus($elapsed);
            $scores = $this->buildFootballScore($i + 1, $elapsed);
            $stageText = $this->buildFootballStageText($elapsed);

            $fixtures[] = [
                'id' => $i + 1,
                'sport' => 'football',
                'league' => $leagues[$i % count($leagues)],
                'home_team' => $teamPairs[$i % count($teamPairs)][0],
                'away_team' => $teamPairs[$i % count($teamPairs)][1],
                'kickoff_time' => date('Y-m-d H:i:s', $matchStart),
                'status' => $status,
                'stage_text' => $stageText,
                'home_score' => $scores['home'],
                'away_score' => $scores['away'],
                'odds' => $this->buildFootballOdds($i + 1),
            ];
        }

        if ($status !== 'all') {
            $fixtures = array_values(array_filter($fixtures, function ($fixture) use ($status) {
                return $fixture['status'] === $status;
            }));
        }

        return $fixtures;
    }

    private function getFootballFixtureById($fixtureId)
    {
        $fixtures = $this->getFootballFixtures('all');
        foreach ($fixtures as $fixture) {
            if ($fixture['id'] == $fixtureId) {
                return $fixture;
            }
        }
        return null;
    }

    private function getFootballMatchStatus($elapsed)
    {
        if ($elapsed < 0) {
            return 'upcoming';
        }

        if ($elapsed < 105 * 60) {
            return 'live';
        }

        return 'finished';
    }

    private function buildFootballStageText($elapsed)
    {
        if ($elapsed < 0) {
            return 'Kickoff in ' . gmdate('G\h i\m', abs($elapsed));
        }

        if ($elapsed < 45 * 60) {
            return '1st Half • ' . max(1, floor($elapsed / 60)) . "'";
        }

        if ($elapsed < 60 * 60) {
            return 'Half Time';
        }

        if ($elapsed < 105 * 60) {
            return '2nd Half • ' . max(1, floor(($elapsed - 60 * 60) / 60)) . "'";
        }

        return 'Full Time';
    }

    private function seededFootballValue($seed, $min, $max)
    {
        $value = crc32($seed);
        return $min + ($value % ($max - $min + 1));
    }

    private function buildFootballScore($fixtureId, $elapsed)
    {
        if ($elapsed < 0) {
            return ['home' => null, 'away' => null];
        }

        $homeFinal = $this->seededFootballValue("football-final-home-{$fixtureId}-" . date('Y-m-d'), 0, 4);
        $awayFinal = $this->seededFootballValue("football-final-away-{$fixtureId}-" . date('Y-m-d'), 0, 4);

        $homeHalf = min($homeFinal, max(0, (int) floor($homeFinal * 0.45)));
        $awayHalf = min($awayFinal, max(0, (int) floor($awayFinal * 0.45)));

        if ($elapsed < 45 * 60) {
            return [
                'home' => min($homeFinal, (int) floor($homeFinal * ($elapsed / (45 * 60)))),
                'away' => min($awayFinal, (int) floor($awayFinal * ($elapsed / (45 * 60)))),
            ];
        }

        if ($elapsed < 60 * 60) {
            return ['home' => $homeHalf, 'away' => $awayHalf];
        }

        if ($elapsed < 105 * 60) {
            $secondElapsed = $elapsed - 60 * 60;
            return [
                'home' => min($homeFinal, $homeHalf + (int) floor(($homeFinal - $homeHalf) * ($secondElapsed / (45 * 60)))),
                'away' => min($awayFinal, $awayHalf + (int) floor(($awayFinal - $awayHalf) * ($secondElapsed / (45 * 60)))),
            ];
        }

        return ['home' => $homeFinal, 'away' => $awayFinal];
    }

    private function buildFootballOdds($fixtureId)
    {
        $seed = crc32("football-odds-{$fixtureId}-" . date('Y-m-d'));
        $homePrice = round(1.60 + ($seed % 80) / 100, 2);
        $drawPrice = round(2.80 + (($seed >> 4) % 60) / 100, 2);
        $awayPrice = round(2.10 + (($seed >> 8) % 90) / 100, 2);

        return [
            ['id' => $fixtureId * 3 + 1, 'fixture_id' => $fixtureId, 'market' => '1x2', 'selection' => '1', 'odds_value' => $homePrice],
            ['id' => $fixtureId * 3 + 2, 'fixture_id' => $fixtureId, 'market' => '1x2', 'selection' => 'X', 'odds_value' => $drawPrice],
            ['id' => $fixtureId * 3 + 3, 'fixture_id' => $fixtureId, 'market' => '1x2', 'selection' => '2', 'odds_value' => $awayPrice],
        ];
    }

    private function evaluateBetAgainstFixture($bet, $fixtureData)
    {
        if (!$fixtureData) {
            return ['status' => $bet->status, 'message' => null];
        }

        $status = is_array($fixtureData) ? $fixtureData['status'] : $fixtureData->status;
        if ($status !== 'finished') {
            return ['status' => $bet->status, 'message' => null];
        }

        $homeScore = is_array($fixtureData) ? $fixtureData['home_score'] : $fixtureData->home_score;
        $awayScore = is_array($fixtureData) ? $fixtureData['away_score'] : $fixtureData->away_score;
        $homeScore = (int) $homeScore;
        $awayScore = (int) $awayScore;

        $actualFt = "{$homeScore}-{$awayScore}";
        $actualHt = $this->getFootballHalfTimeScore($fixtureData);

        $won = false;
        $message = 'Final result: ' . $actualFt;

        switch ($bet->market) {
            case 'ft_score':
                $won = $bet->selection === $actualFt;
                break;
            case 'ht_score':
                $won = $bet->selection === $actualHt;
                break;
            case '1x2':
                $result = $homeScore === $awayScore ? 'X' : ($homeScore > $awayScore ? '1' : '2');
                $won = $bet->selection === $result;
                break;
            case 'btts':
                $won = ($bet->selection === 'Yes' && $homeScore > 0 && $awayScore > 0)
                    || ($bet->selection === 'No' && ($homeScore === 0 || $awayScore === 0));
                break;
            default:
                if (strpos($bet->market, 'totals') === 0) {
                    $threshold = floatval(substr($bet->selection, 1));
                    $total = $homeScore + $awayScore;
                    if ($bet->selection[0] === 'O') {
                        $won = $total > $threshold;
                    } else {
                        $won = $total < $threshold;
                    }
                }
                break;
        }

        if ($won) {
            $message = 'Congratulations! Correct score prediction.';
        }

        return ['status' => $won ? 'won' : 'lost', 'message' => $message];
    }

    private function getFootballHalfTimeScore($fixtureData)
    {
        $fixtureId = is_array($fixtureData) ? $fixtureData['id'] : $fixtureData->id;
        $scores = $this->buildFootballScore($fixtureId, 45 * 60);
        return "{$scores['home']}-{$scores['away']}";
    }
}
