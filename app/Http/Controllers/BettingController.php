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
        if(Session::get('user_id') == '')
        {
            return redirect(url('login'));
        }
        return view('football');
    }

    public function hockeyPage()
    {
        if(Session::get('user_id') == '')
        {
            return redirect(url('login'));
        }
        return view('hockey');
    }

    public function basketballPage()
    {
        if(Session::get('user_id') == '')
        {
            return redirect(url('login'));
        }
        return view('basketball');
    }

    public function boxingPage()
    {
        if(Session::get('user_id') == '')
        {
            return redirect(url('login'));
        }
        return view('boxing');
    }

    public function americanFootballPage()
    {
        if(Session::get('user_id') == '')
        {
            return redirect(url('login'));
        }
        return view('american-football');
    }

    public function getFixtures(Request $request)
    {
        $sport = $request->get('sport', 'football');
        $status = $request->get('status', 'upcoming');

        try {
            $query = Fixture::where('sport', $sport)->with('odds')->orderBy('kickoff_time', 'asc');

            if($status !== 'all') {
                $query->where('status', $status);
            }

            $fixtures = $query->get();

            if($fixtures->isEmpty()){
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
        if(!$userId){
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $fixtureId = $request->input('fixture_id');
        $market = $request->input('market');
        $selection = $request->input('selection');
        $stake = $request->input('stake', 10);
        $odds = $request->input('odds');

        $fixture = Fixture::find($fixtureId);
        if(!$fixture){
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
        if(!$userId){
            return response()->json(['error' => 'Not authenticated'], 401);
        }

        $bets = Bet::where('user_id', $userId)
            ->where('status', 'pending')
            ->with('fixture')
            ->get();

        $totalStake = $bets->sum('stake');
        $totalOdds = 1;
        $totalReturn = 1;

        foreach($bets as $bet){
            $totalOdds *= $bet->odds;
        }

        $totalReturn = $totalStake * $totalOdds;

        return response()->json([
            'bets' => $bets,
            'total_stake' => $totalStake,
            'total_odds' => round($totalOdds, 2),
            'total_return' => round($totalReturn, 2),
            'count' => $bets->count(),
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

        if($bets->isEmpty()){
            return response()->json(['error' => 'No bets in slip'], 400);
        }

        // Mark all bets as submitted (in real scenario, integrate with payment)
        foreach($bets as $bet){
            $bet->update(['status' => 'submitted']);
        }

        return response()->json(['success' => 'Bet slip submitted']);
    }

    private function getMockFixtures($sport = 'football')
    {
        $fixtures = [];

        if($sport === 'hockey') {
            $leagues = ['NHL', 'KHL', 'AHL', 'SHL', 'Liiga'];
            $statusTeams = [
                'upcoming' => [
                    ['Toronto Maple Leafs', 'Montreal Canadiens'],
                    ['Washington Capitals', 'Carolina Hurricanes'],
                    ['Calgary Flames', 'Edmonton Oilers'],
                    ['New York Rangers', 'New Jersey Devils'],
                    ['Vegas Golden Knights', 'Seattle Kraken'],
                    ['Chicago Blackhawks', 'St. Louis Blues'],
                    ['Vancouver Canucks', 'Winnipeg Jets'],
                    ['Boston Bruins', 'Buffalo Sabres'],
                    ['Florida Panthers', 'Tampa Bay Lightning'],
                    ['Dallas Stars', 'Colorado Avalanche'],
                ],
                'live' => [
                    ['Pittsburgh Penguins', 'Detroit Red Wings'],
                    ['Los Angeles Kings', 'Anaheim Ducks'],
                    ['Toronto Maple Leafs', 'Ottawa Senators'],
                    ['Minnesota Wild', 'Nashville Predators'],
                    ['Philadelphia Flyers', 'New York Islanders'],
                    ['San Jose Sharks', 'Arizona Coyotes'],
                    ['Carolina Hurricanes', 'Columbus Blue Jackets'],
                    ['Montreal Canadiens', 'Buffalo Sabres'],
                    ['Washington Capitals', 'Florida Panthers'],
                    ['Calgary Flames', 'Vancouver Canucks'],
                ],
                'finished' => [
                    ['Boston Bruins', 'Chicago Blackhawks'],
                    ['Tampa Bay Lightning', 'Seattle Kraken'],
                    ['New Jersey Devils', 'New York Rangers'],
                    ['Colorado Avalanche', 'Dallas Stars'],
                    ['Edmonton Oilers', 'Los Angeles Kings'],
                    ['Pittsburgh Penguins', 'Washington Capitals'],
                    ['Montreal Canadiens', 'Toronto Maple Leafs'],
                    ['Philadelphia Flyers', 'New York Islanders'],
                    ['Nashville Predators', 'Minnesota Wild'],
                    ['Calgary Flames', 'St. Louis Blues'],
                ],
            ];
        } elseif($sport === 'basketball') {
            $leagues = ['NBA', 'EuroLeague', 'NBA G League', 'EuroCup', 'FIBA Champions League'];
            $statusTeams = [
                'upcoming' => [
                    ['Los Angeles Lakers', 'Boston Celtics'],
                    ['Golden State Warriors', 'Phoenix Suns'],
                    ['Milwaukee Bucks', 'Brooklyn Nets'],
                    ['Miami Heat', 'Philadelphia 76ers'],
                    ['Denver Nuggets', 'Dallas Mavericks'],
                    ['Chicago Bulls', 'New York Knicks'],
                    ['Toronto Raptors', 'Miami Heat'],
                    ['Houston Rockets', 'Los Angeles Clippers'],
                    ['Atlanta Hawks', 'Sacramento Kings'],
                    ['Orlando Magic', 'Indiana Pacers'],
                ],
                'live' => [
                    ['Phoenix Suns', 'Los Angeles Lakers'],
                    ['Boston Celtics', 'Milwaukee Bucks'],
                    ['Denver Nuggets', 'Golden State Warriors'],
                    ['Miami Heat', 'Brooklyn Nets'],
                    ['Dallas Mavericks', 'Phoenix Suns'],
                    ['Chicago Bulls', 'Toronto Raptors'],
                    ['Philadelphia 76ers', 'New York Knicks'],
                    ['Houston Rockets', 'Atlanta Hawks'],
                    ['Utah Jazz', 'Sacramento Kings'],
                    ['Oklahoma City Thunder', 'New Orleans Pelicans'],
                ],
                'finished' => [
                    ['Los Angeles Clippers', 'Denver Nuggets'],
                    ['Brooklyn Nets', 'Miami Heat'],
                    ['Boston Celtics', 'Philadelphia 76ers'],
                    ['Golden State Warriors', 'Phoenix Suns'],
                    ['Dallas Mavericks', 'Memphis Grizzlies'],
                    ['Chicago Bulls', 'Milwaukee Bucks'],
                    ['New York Knicks', 'Toronto Raptors'],
                    ['Houston Rockets', 'Denver Nuggets'],
                    ['Atlanta Hawks', 'Orlando Magic'],
                    ['Minnesota Timberwolves', 'Portland Trail Blazers'],
                ],
            ];
        } elseif($sport === 'boxing') {
            $leagues = ['WBC World Title', 'WBA Super', 'IBF Championship', 'WBO World', 'The Ring'];
            $statusTeams = [
                'upcoming' => [
                    ['Canelo Alvarez', 'Gennadiy Golovkin'],
                    ['Terence Crawford', 'Errol Spence Jr.'],
                    ['Oleksandr Usyk', 'Tyson Fury'],
                    ['Naoya Inoue', 'Josh Taylor'],
                    ['Shakur Stevenson', 'Vasiliy Lomachenko'],
                    ['Gervonta Davis', 'Ryan Garcia'],
                    ['Devin Haney', 'Josh Taylor'],
                    ['Artur Beterbiev', 'Dmitry Bivol'],
                    ['Naoya Inoue', 'Emmanuel Navarrete'],
                    ['Claressa Shields', 'Cecilia Braekhus'],
                ],
                'live' => [
                    ['Terence Crawford', 'Errol Spence Jr.'],
                    ['Canelo Alvarez', 'Gennadiy Golovkin'],
                    ['Devin Haney', 'Josh Taylor'],
                    ['Oleksandr Usyk', 'Tyson Fury'],
                    ['Naoya Inoue', 'Josh Taylor'],
                    ['Gervonta Davis', 'Ryan Garcia'],
                    ['Artur Beterbiev', 'Dmitry Bivol'],
                    ['Shakur Stevenson', 'Vasiliy Lomachenko'],
                    ['Claressa Shields', 'Cecilia Braekhus'],
                    ['Candy Jacobs', 'Rising Prospect'],
                ],
                'finished' => [
                    ['Canelo Alvarez', 'Gennadiy Golovkin'],
                    ['Terence Crawford', 'Errol Spence Jr.'],
                    ['Oleksandr Usyk', 'Tyson Fury'],
                    ['Naoya Inoue', 'Josh Taylor'],
                    ['Shakur Stevenson', 'Vasiliy Lomachenko'],
                    ['Devin Haney', 'Josh Taylor'],
                    ['Gervonta Davis', 'Ryan Garcia'],
                    ['Artur Beterbiev', 'Dmitry Bivol'],
                    ['Claressa Shields', 'Cecilia Braekhus'],
                    ['Errol Spence Jr.', 'Terence Crawford'],
                ],
            ];
        } elseif($sport === 'american-football') {
            $leagues = ['NFL Regular Season', 'NFL Playoffs', 'NCAA Bowl Weekend', 'XFL Showcase', 'USFL Prime'];
            $statusTeams = [
                'upcoming' => [
                    ['Kansas City Chiefs', 'Buffalo Bills'],
                    ['San Francisco 49ers', 'Dallas Cowboys'],
                    ['Philadelphia Eagles', 'New York Giants'],
                    ['Cincinnati Bengals', 'Baltimore Ravens'],
                    ['Miami Dolphins', 'New England Patriots'],
                    ['Los Angeles Rams', 'Seattle Seahawks'],
                    ['Green Bay Packers', 'Chicago Bears'],
                    ['Tampa Bay Buccaneers', 'New Orleans Saints'],
                    ['Jacksonville Jaguars', 'Houston Texans'],
                    ['Las Vegas Raiders', 'Denver Broncos'],
                ],
                'live' => [
                    ['Buffalo Bills', 'New England Patriots'],
                    ['Kansas City Chiefs', 'Las Vegas Raiders'],
                    ['Dallas Cowboys', 'Washington Commanders'],
                    ['San Francisco 49ers', 'Arizona Cardinals'],
                    ['Miami Dolphins', 'New York Jets'],
                    ['Baltimore Ravens', 'Pittsburgh Steelers'],
                    ['Los Angeles Chargers', 'Kansas City Chiefs'],
                    ['New Orleans Saints', 'Atlanta Falcons'],
                    ['Minnesota Vikings', 'Detroit Lions'],
                    ['Seattle Seahawks', 'Los Angeles Rams'],
                ],
                'finished' => [
                    ['New York Giants', 'Philadelphia Eagles'],
                    ['Cincinnati Bengals', 'Tennessee Titans'],
                    ['Green Bay Packers', 'Chicago Bears'],
                    ['Tampa Bay Buccaneers', 'Carolina Panthers'],
                    ['Denver Broncos', 'Kansas City Chiefs'],
                    ['Pittsburgh Steelers', 'Cleveland Browns'],
                    ['Buffalo Bills', 'Miami Dolphins'],
                    ['San Francisco 49ers', 'Los Angeles Rams'],
                    ['New England Patriots', 'Buffalo Bills'],
                    ['Las Vegas Raiders', 'Indianapolis Colts'],
                ],
            ];
        } else {
            $leagues = [
                'Primera B Argentina',
                'Primera C Argentina',
                'Primera LPF, Reserves, Apertura',
                'Torneo Regional Federal Juvenil Amateur Argentina',
                'Liga Regional San Francisco, Sur Argentina',
                'Division Plata 2A Aruba',
                'EAFF East Asian Cup, Women, Qualification',
                'ASEAN Championship U19, Group C',
                'SAFF Women\'s Championship, Knockout stage',
                'Capital NPL 1 Australia',
                'Queensland NPL',
                'Queensland NPL, Women',
                'Queensland Premier League 1',
                'NSW League Two',
                'NSW U20 Premier League',
                'Victoria Cup, Women',
                'Northern NSW League One, Reserves, Women',
                'Northern NSW NPL, Women',
                'South Australia State League, Women',
                'NPL Capital U23',
                'West Australia - State League Div 2 Reserves',
                'Western Australia Amateur Division 1',
                'Regionalliga Ost',
                'Regionalliga Mitte',
                'Regionalliga West',
                'OÖ Liga',
                'II. Liga Burgenland, Mitte',
                'Burgenland 1. Klasse - Nord',
                'Gebietsliga Süd'
            ];
            $statusTeams = [
                'upcoming' => [
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
                ],
                'live' => [
                    ['Boca Juniors Reserve', 'River Plate Reserve'],
                    ['Newell\'s Old Boys Reserve', 'Banfield Reserve'],
                    ['San Lorenzo Reserve', 'Vélez Sarsfield Reserve'],
                    ['Godoy Cruz Reserve', 'Huracán Reserve'],
                    ['Defensa y Justicia Reserve', 'Argentinos Juniors Reserve'],
                    ['Patronato Reserve', 'Central Córdoba Reserve'],
                    ['Unión Reserve', 'Barracas Central Reserve'],
                    ['Aldosivi Reserve', 'Olimpo Reserve'],
                    ['Santos Laguna Reserve', 'Pachuca Reserve'],
                    ['Atlas Reserve', 'Monterrey Reserve'],
                ],
                'finished' => [
                    ['Racing Reserve', 'San Martín Reserve'],
                    ['Belgrano Reserve', 'Quilmes Reserve'],
                    ['Tigre Reserve', 'Huracán Reserve'],
                    ['Defensa y Justicia Reserve', 'Gimnasia Reserve'],
                    ['Banfield Reserve', 'Sarmiento Reserve'],
                    ['Rosario Central Reserve', 'Newell\'s Reserve'],
                    ['River Plate Reserve', 'Boca Juniors Reserve'],
                    ['Estudiantes Reserve', 'Lanús Reserve'],
                    ['Argentinos Juniors Reserve', 'Vélez Sarsfield Reserve'],
                    ['Colón Reserve', 'Aldosivi Reserve'],
                ],
            ];
        }

        $statuses = ['upcoming', 'live', 'finished'];
        $idx = 1;

        foreach($statuses as $status) {
            for($i = 0; $i < 10; $i++) {
                $pair = $statusTeams[$status][$i];
                if($status === 'upcoming') {
                    $kickoffTime = date('Y-m-d H:i:s', strtotime('+' . ($i + 1) . ' hours'));
                    $homeScore = null;
                    $awayScore = null;
                } elseif($status === 'live') {
                    $kickoffTime = date('Y-m-d H:i:s', strtotime('-' . rand(5, 55) . ' minutes'));
                    $homeScore = rand(0, 5);
                    $awayScore = rand(0, 5);
                } else {
                    $kickoffTime = date('Y-m-d H:i:s', strtotime('-' . rand(70, 180) . ' minutes'));
                    $homeScore = rand(0, 6);
                    $awayScore = rand(0, 6);
                }

                $odds = [];

                if($sport === 'boxing') {
                    $odds = [
                        ['id' => $idx*30-29, 'fixture_id' => $idx, 'market' => 'moneyline', 'selection' => '1', 'odds_value' => round(rand(140, 240) / 100, 2)],
                        ['id' => $idx*30-28, 'fixture_id' => $idx, 'market' => 'moneyline', 'selection' => 'X', 'odds_value' => round(rand(600, 900) / 100, 2)],
                        ['id' => $idx*30-27, 'fixture_id' => $idx, 'market' => 'moneyline', 'selection' => '2', 'odds_value' => round(rand(160, 260) / 100, 2)],
                        ['id' => $idx*30-26, 'fixture_id' => $idx, 'market' => 'rounds', 'selection' => 'O7.5', 'odds_value' => 1.95],
                        ['id' => $idx*30-25, 'fixture_id' => $idx, 'market' => 'rounds', 'selection' => 'U7.5', 'odds_value' => 1.75],
                        ['id' => $idx*30-24, 'fixture_id' => $idx, 'market' => 'rounds', 'selection' => 'O9.5', 'odds_value' => 2.45],
                        ['id' => $idx*30-23, 'fixture_id' => $idx, 'market' => 'rounds', 'selection' => 'U9.5', 'odds_value' => 1.55],
                        ['id' => $idx*30-22, 'fixture_id' => $idx, 'market' => 'method', 'selection' => 'KO/TKO', 'odds_value' => 1.88],
                        ['id' => $idx*30-21, 'fixture_id' => $idx, 'market' => 'method', 'selection' => 'Decision', 'odds_value' => 2.10],
                        ['id' => $idx*30-20, 'fixture_id' => $idx, 'market' => 'method', 'selection' => 'Draw', 'odds_value' => 9.50],
                        ['id' => $idx*30-19, 'fixture_id' => $idx, 'market' => 'finish', 'selection' => 'Inside Distance', 'odds_value' => 1.72],
                        ['id' => $idx*30-18, 'fixture_id' => $idx, 'market' => 'finish', 'selection' => 'Decision', 'odds_value' => 2.20],
                    ];
                } elseif($sport === 'american-football') {
                    $odds = [
                        ['id' => $idx*30-29, 'fixture_id' => $idx, 'market' => 'moneyline', 'selection' => '1', 'odds_value' => round(rand(140, 240) / 100, 2)],
                        ['id' => $idx*30-28, 'fixture_id' => $idx, 'market' => 'moneyline', 'selection' => '2', 'odds_value' => round(rand(160, 270) / 100, 2)],
                        ['id' => $idx*30-27, 'fixture_id' => $idx, 'market' => 'spread', 'selection' => '-3.5', 'odds_value' => 1.90],
                        ['id' => $idx*30-26, 'fixture_id' => $idx, 'market' => 'spread', 'selection' => '+3.5', 'odds_value' => 1.95],
                        ['id' => $idx*30-25, 'fixture_id' => $idx, 'market' => 'totals', 'selection' => 'O45.5', 'odds_value' => 1.92],
                        ['id' => $idx*30-24, 'fixture_id' => $idx, 'market' => 'totals', 'selection' => 'U45.5', 'odds_value' => 1.88],
                        ['id' => $idx*30-23, 'fixture_id' => $idx, 'market' => 'totals', 'selection' => 'O52.5', 'odds_value' => 2.05],
                        ['id' => $idx*30-22, 'fixture_id' => $idx, 'market' => 'totals', 'selection' => 'U52.5', 'odds_value' => 1.82],
                        ['id' => $idx*30-21, 'fixture_id' => $idx, 'market' => 'first_score', 'selection' => 'Touchdown', 'odds_value' => 1.70],
                        ['id' => $idx*30-20, 'fixture_id' => $idx, 'market' => 'first_score', 'selection' => 'Field Goal', 'odds_value' => 2.25],
                        ['id' => $idx*30-19, 'fixture_id' => $idx, 'market' => 'first_score', 'selection' => 'Safety', 'odds_value' => 8.50],
                    ];
                } else {
                    $odds = array_merge(
                        [
                            ['id' => $idx*30-29, 'fixture_id' => $idx, 'market' => '1x2', 'selection' => '1', 'odds_value' => round(rand(150, 250) / 100, 2)],
                            ['id' => $idx*30-28, 'fixture_id' => $idx, 'market' => '1x2', 'selection' => 'X', 'odds_value' => round(rand(300, 380) / 100, 2)],
                            ['id' => $idx*30-27, 'fixture_id' => $idx, 'market' => '1x2', 'selection' => '2', 'odds_value' => round(rand(220, 450) / 100, 2)],
                        ],
                        array_map(function($sel) use ($idx) {
                            return ['id' => $idx*30 + $sel['index'], 'fixture_id' => $idx, 'market' => 'totals', 'selection' => $sel['label'], 'odds_value' => $sel['value']];
                        }, [
                            ['index' => 1, 'label' => 'O0.5', 'value' => 1.35],
                            ['index' => 2, 'label' => 'U0.5', 'value' => 1.12],
                            ['index' => 3, 'label' => 'O1.5', 'value' => 1.65],
                            ['index' => 4, 'label' => 'U1.5', 'value' => 1.25],
                            ['index' => 5, 'label' => 'O2.5', 'value' => 2.10],
                            ['index' => 6, 'label' => 'U2.5', 'value' => 1.66],
                            ['index' => 7, 'label' => 'O3.5', 'value' => 3.45],
                            ['index' => 8, 'label' => 'U3.5', 'value' => 1.26],
                            ['index' => 9, 'label' => 'O4.5', 'value' => 4.80],
                            ['index' => 10, 'label' => 'U4.5', 'value' => 1.12],
                            ['index' => 11, 'label' => 'O5.5', 'value' => 7.20],
                            ['index' => 12, 'label' => 'U5.5', 'value' => 1.08],
                            ['index' => 13, 'label' => 'O6.5', 'value' => 11.50],
                            ['index' => 14, 'label' => 'U6.5', 'value' => 1.05],
                        ]),
                        [
                            ['id' => $idx*30+15, 'fixture_id' => $idx, 'market' => 'spread', 'selection' => '-3.5', 'odds_value' => 1.90],
                            ['id' => $idx*30+16, 'fixture_id' => $idx, 'market' => 'spread', 'selection' => '+3.5', 'odds_value' => 1.95],
                        ],
                        [
                            ['id' => $idx*30+15, 'fixture_id' => $idx, 'market' => 'btts', 'selection' => 'Yes', 'odds_value' => 1.75],
                            ['id' => $idx*30+16, 'fixture_id' => $idx, 'market' => 'btts', 'selection' => 'No', 'odds_value' => 2.10],
                        ],
                        [
                            ['id' => $idx*30+17, 'fixture_id' => $idx, 'market' => 'ht_score', 'selection' => '0-0', 'odds_value' => 4.20],
                            ['id' => $idx*30+18, 'fixture_id' => $idx, 'market' => 'ht_score', 'selection' => '1-0', 'odds_value' => 4.60],
                            ['id' => $idx*30+19, 'fixture_id' => $idx, 'market' => 'ht_score', 'selection' => '0-1', 'odds_value' => 5.00],
                            ['id' => $idx*30+20, 'fixture_id' => $idx, 'market' => 'ht_score', 'selection' => '1-1', 'odds_value' => 5.50],
                        ],
                        [
                            ['id' => $idx*30+21, 'fixture_id' => $idx, 'market' => 'ft_score', 'selection' => '1-0', 'odds_value' => 6.10],
                            ['id' => $idx*30+22, 'fixture_id' => $idx, 'market' => 'ft_score', 'selection' => '0-1', 'odds_value' => 7.20],
                            ['id' => $idx*30+23, 'fixture_id' => $idx, 'market' => 'ft_score', 'selection' => '1-1', 'odds_value' => 5.80],
                            ['id' => $idx*30+24, 'fixture_id' => $idx, 'market' => 'ft_score', 'selection' => '2-1', 'odds_value' => 8.50],
                            ['id' => $idx*30+25, 'fixture_id' => $idx, 'market' => 'ft_score', 'selection' => '1-2', 'odds_value' => 9.10],
                            ['id' => $idx*30+26, 'fixture_id' => $idx, 'market' => 'ft_score', 'selection' => '2-2', 'odds_value' => 12.00],
                        ]
                    );
                }

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
}
