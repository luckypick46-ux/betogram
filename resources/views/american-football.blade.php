@include('common/header_link')
@include('common/leftbar')
<div class="bog_content">
    @include('common/register_header')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="page-header" style="margin-bottom: 24px; padding: 18px 22px; background: #f0f7ff; border: 1px solid #c8d8ee; border-radius: 6px;">
                    <h2 style="margin: 0; font-size: 24px; color: #1e4d80;"><i class="fa fa-football-ball"></i> American Football Betting</h2>
                    <p style="margin: 8px 0 0; color: #546d85; font-size: 14px; max-width: 720px;">Browse upcoming NFL, college, and spring league matchups with action-ready markets and live scoring panels.</p>
                </div>

                <div class="highlight-card" id="featured-game">
                    <div class="highlight-top">
                        <div>
                            <span class="highlight-label">Featured Game</span>
                            <h3 id="highlight-title">Loading highlight...</h3>
                            <p id="highlight-league" class="highlight-meta">Stadium: Premium Matchup</p>
                        </div>
                        <div class="highlight-score" id="highlight-status">LIVE</div>
                    </div>
                    <div class="highlight-details">
                        <div class="team-block">
                            <strong id="highlight-home">Home Team</strong>
                            <span id="highlight-home-score">0</span>
                        </div>
                        <div class="vs-block">vs</div>
                        <div class="team-block">
                            <strong id="highlight-away">Away Team</strong>
                            <span id="highlight-away-score">0</span>
                        </div>
                    </div>
                    <div class="highlight-meta-row">
                        <span id="highlight-time">Starts in 45 mins</span>
                        <span id="highlight-market">Top market: Moneyline</span>
                    </div>
                </div>

                <div class="all_feed_wrap">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#upcoming-matches" data-status="upcoming" role="tab" data-toggle="tab"><i class="fa fa-calendar"></i> Upcoming</a></li>
                        <li role="presentation"><a href="#live-matches" data-status="live" role="tab" data-toggle="tab"><i class="fa fa-bolt"></i> Live</a></li>
                        <li role="presentation"><a href="#finished-matches" data-status="finished" role="tab" data-toggle="tab"><i class="fa fa-check-circle"></i> Finished</a></li>
                    </ul>
                    
                    <div class="tab-content" style="padding: 20px 0;">
                        <div role="tabpanel" class="tab-pane active" id="upcoming-matches">
                            <div id="upcoming-fixtures" class="fixtures-list"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="live-matches">
                            <div id="live-fixtures" class="fixtures-list"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="finished-matches">
                            <div id="finished-fixtures" class="fixtures-list"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="betingtab" style="position: sticky; top: 90px;">
                    <h3 style="padding: 15px; margin: 0; border-bottom: 1px solid #c8d8ee; display: flex; justify-content: space-between; align-items: center;">
                        <span><i class="fa fa-list"></i> Bet Slip</span>
                        <span id="slip-count" class="badge" style="background: #1e4d80; color: #fff; padding: 4px 8px; border-radius: 3px; font-size: 11px; font-weight: 600;">0</span>
                    </h3>
                    
                    <div id="slip-bets" class="slip-content" style="max-height: 350px; overflow-y: auto; padding: 0;">
                        <p style="text-align: center; color: #999; padding: 20px;">No bets added yet</p>
                    </div>

                    <div style="padding: 15px; border-top: 1px solid #c8d8ee; background: #f7fbff;">
                        <div class="slip-summary-item">
                            <span>Total Stake:</span>
                            <strong id="total-stake">$0.00</strong>
                        </div>
                        <div class="slip-summary-item">
                            <span>Total Odds:</span>
                            <strong id="total-odds">0.00x</strong>
                        </div>
                        <div class="slip-summary-item" style="border-top: 1px solid #d7e3f1; padding-top: 10px; margin-top: 10px;">
                            <span style="font-weight: 600;">Potential Return:</span>
                            <strong id="potential-return" style="color: #1e4d80; font-size: 16px;">$0.00</strong>
                        </div>

                        <div style="margin-top: 15px;">
                            <label style="font-size: 12px; font-weight: 600; color: #333; margin-bottom: 8px; display: block;">Stake Per Bet (USD)</label>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="number" id="stake-input" class="form-control" value="10" min="1" max="10000" step="5" style="border: 1px solid #b8c7d9; height: 40px; border-radius: 0 2px 2px 0;">
                            </div>
                        </div>

                        <div style="margin-top: 12px;">
                            <a href="#" id="submit-slip-btn" class="btn btn-deposit btn-block" style="background: #1e4d80; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block; width: 100%; box-sizing: border-box; border: none; margin-bottom: 8px; transition: all 0.2s ease;">Place Bets</a>
                            <a href="#" id="clear-slip-btn" class="btn btn-default btn-block" style="background: #e9f3fb; color: #1e4d80; padding: 10px; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block; width: 100%; box-sizing: border-box; border: 1px solid #c8d8ee; transition: all 0.2s ease;">Clear Slip</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('common/footer_link')

<style>
.fixtures-list { display: flex; flex-direction: column; gap: 12px; }
.fixture-card-item { background: #fff; border: 1px solid #c8d8ee; border-radius: 6px; padding: 18px; display: flex; flex-direction: column; box-shadow: 0 2px 6px rgba(30, 77, 128, 0.08); transition: all 0.2s ease; }
.fixture-card-item:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(30, 77, 128, 0.14); }
.fixture-league-label { font-size: 11px; color: #5c789d; text-transform: uppercase; font-weight: 700; margin-bottom: 10px; }
.fixture-match-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; }
.fixture-teams { flex: 1; }
.fixture-team-pair { font-weight: 700; color: #1e4d80; font-size: 15px; line-height: 22px; margin-bottom: 6px; }
.fixture-time-info { font-size: 12px; color: #5b6985; }
.fixture-score-info { font-size: 14px; font-weight: 700; color: #243a57; margin-top: 4px; }
.fixture-status { display: inline-block; padding: 3px 9px; border-radius: 16px; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; margin-right: 8px; }
.fixture-status.live { background: #d9534f; color: #fff; }
.fixture-status.finished { background: #343a40; color: #fff; }
.fixture-status.upcoming { background: #1e4d80; color: #fff; }
.highlight-card { background: url('{{ asset('assets/front_end/images/american-football.png') }}') center center / cover no-repeat, linear-gradient(180deg, rgba(14,34,69,0.72) 0%, rgba(14,34,69,0.72) 100%); border: 1px solid rgba(255,255,255,0.18); border-radius: 16px; padding: 22px; margin-bottom: 18px; box-shadow: 0 18px 32px rgba(30, 77, 128, 0.15); position: relative; overflow: hidden; color: #fff; }
.highlight-card::before { content: ''; position: absolute; inset: 0; background: rgba(14,34,69,0.32); pointer-events: none; }
.highlight-card::after { content: ''; position: absolute; inset: 0; background-image: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.18), transparent 25%), radial-gradient(circle at 80% 10%, rgba(255,255,255,0.12), transparent 18%); opacity: 0.55; pointer-events: none; }
.highlight-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; margin-bottom: 16px; position: relative; z-index: 1; }
.highlight-label { display: inline-block; font-size: 11px; color: #4f7096; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 4px; }
.highlight-score { background: #1e4d80; color: #fff; padding: 6px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; text-transform: uppercase; }
.highlight-details { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 14px; }
.team-block { flex: 1; background: #fff; border: 1px solid #d7e5f4; border-radius: 8px; padding: 14px; text-align: center; }
.team-block strong { display: block; font-size: 14px; color: #1e4d80; margin-bottom: 8px; }
.team-block span { display: inline-flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 50%; background: #f0f7ff; color: #1e4d80; font-size: 18px; font-weight: 700; }
.vs-block { min-width: 50px; text-align: center; color: #5b6985; font-size: 13px; font-weight: 700; }
.highlight-meta-row { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px; font-size: 12px; color: #5b6985; }
.fixture-market { margin-top: 16px; }
.fixture-market-title { font-size: 12px; color: #1e4d80; font-weight: 700; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.4px; }
.fixture-odds-grid { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; }
.odd-btn { flex: 1 1 120px; min-width: 120px; padding: 10px 8px; background: #f2f6fb; border: 1px solid #d7e5f4; border-radius: 4px; text-align: center; cursor: pointer; transition: all 0.2s ease; font-size: 13px; }
.odd-btn:hover { background: #e4effd; border-color: #1e4d80; }
.odd-btn.selected { background: #1e4d80; color: #fff; border-color: #1e4d80; }
.odd-label { font-size: 11px; color: #5c789d; margin-bottom: 4px; }
.odd-value { font-weight: 700; color: #1e4d80; font-size: 14px; }
.odd-btn.selected .odd-label { color: #d1e1fb; }
.odd-btn.selected .odd-value { color: #fff; }
.slip-summary-item { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 13px; }
.slip-content { border-top: 1px solid #c8d8ee; background: #f7fbff; }
.slip-item { display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #d7e5f4; background: #fff; }
.slip-item-info { flex: 1; }
.slip-item-match { font-size: 12px; font-weight: 700; color: #1e4d80; }
.slip-item-odd { font-size: 11px; color: #5b6985; }
.slip-item-remove { cursor: pointer; color: #d9534f; font-weight: 700; font-size: 16px; line-height: 1; }
#submit-slip-btn:hover { background: #163c66 !important; }
#clear-slip-btn:hover { background: #cddff1 !important; }
@media (max-width: 768px) {
    .col-md-9, .col-md-3 { margin-bottom: 20px; }
    .fixture-match-row { flex-direction: column; align-items: flex-start; }
    .fixture-odds-grid { flex-wrap: wrap; }
}
</style>

<script>
$(function(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    function formatDate(isoDate) {
        var date = new Date(isoDate);
        var day = date.toLocaleDateString('en-US', {month: 'short', day: 'numeric'});
        var time = date.toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: false});
        return day + ' | ' + time;
    }

    function getFixtureOdd(fixture, market, selection) {
        if(!fixture.odds || !fixture.odds.length) {
            return null;
        }
        return fixture.odds.find(function(o) {
            return o.market === market && o.selection === selection;
        });
    }

    function formatOdds(value) {
        return parseFloat(value).toFixed(2);
    }

    function renderMarketButtons(fixture, marketKey, marketTitle, selections) {
        var marketSection = $('<div class="fixture-market"></div>');
        marketSection.append('<div class="fixture-market-title">' + marketTitle + '</div>');
        var optionsRow = $('<div class="fixture-odds-grid"></div>');

        selections.forEach(function(sel) {
            var oddObj = getFixtureOdd(fixture, marketKey, sel.selection);
            if(!oddObj) {
                oddObj = { odds_value: 1.95 };
            }
            var btn = $('<div class="odd-btn" data-fixture-id="' + fixture.id + '" data-market="' + marketKey + '" data-selection="' + sel.selection + '" data-odds="' + formatOdds(oddObj.odds_value) + '"></div>');
            btn.append('<div class="odd-label">' + sel.label + '</div>');
            btn.append('<div class="odd-value">@ ' + formatOdds(oddObj.odds_value) + '</div>');
            optionsRow.append(btn);
        });

        marketSection.append(optionsRow);
        return marketSection;
    }

    function renderFixtures(fixtures, containerId) {
        var $container = $(containerId);
        $container.empty();

        if(!fixtures || fixtures.length === 0) {
            $container.append('<p style="text-align: center; color: #999; padding: 30px;">No matches available</p>');
            return;
        }

        fixtures.forEach(function(fixture) {
            var card = $('<div class="fixture-card-item"></div>');
            card.append('<div class="fixture-league-label"><i class="fa fa-flag"></i> ' + fixture.league + '</div>');

            var matchRow = $('<div class="fixture-match-row"></div>');
            var teamsDiv = $('<div class="fixture-teams"></div>');
            teamsDiv.append('<div class="fixture-team-pair">' + fixture.home_team + ' vs ' + fixture.away_team + '</div>');

            var statusBadge = fixture.status === 'live'
                ? '<span class="fixture-status live">LIVE</span>'
                : fixture.status === 'finished'
                ? '<span class="fixture-status finished">FT</span>'
                : '<span class="fixture-status upcoming">UPCOMING</span>';

            var statusInfo = fixture.status === 'upcoming'
                ? '<div class="fixture-time-info"><i class="fa fa-clock-o"></i> ' + formatDate(fixture.kickoff_time) + '</div>'
                : '<div class="fixture-score-info">' + statusBadge + ' <strong>' + (fixture.home_score || 0) + ' - ' + (fixture.away_score || 0) + '</strong></div>';

            teamsDiv.append(statusInfo);
            matchRow.append(teamsDiv);
            card.append(matchRow);

            card.append(renderMarketButtons(fixture, 'moneyline', 'Moneyline', [
                { label: fixture.home_team, selection: '1' },
                { label: fixture.away_team, selection: '2' }
            ]));

            card.append(renderMarketButtons(fixture, 'spread', 'Point Spread', [
                { label: fixture.home_team + ' -3.5', selection: '-3.5' },
                { label: fixture.away_team + ' +3.5', selection: '+3.5' }
            ]));

            card.append(renderMarketButtons(fixture, 'totals', 'Total Points Over/Under', [
                { label: 'O45.5', selection: 'O45.5' },
                { label: 'U45.5', selection: 'U45.5' },
                { label: 'O52.5', selection: 'O52.5' },
                { label: 'U52.5', selection: 'U52.5' }
            ]));

            card.append(renderMarketButtons(fixture, 'first_score', 'First Score Type', [
                { label: 'Touchdown', selection: 'Touchdown' },
                { label: 'Field Goal', selection: 'Field Goal' },
                { label: 'Safety', selection: 'Safety' }
            ]));

            $container.append(card);
        });
    }

    function renderFeaturedGame(fixture) {
        if(!fixture) {
            $('#highlight-title').text('No featured game available');
            $('#highlight-league').text('Check back soon for top NFL matchups');
            $('#highlight-status').text('UPCOMING');
            $('#highlight-home').text('TBD');
            $('#highlight-away').text('TBD');
            $('#highlight-home-score').text('-');
            $('#highlight-away-score').text('-');
            $('#highlight-time').text('Awaiting next matchup');
            $('#highlight-market').text('Top market: Moneyline');
            return;
        }

        $('#highlight-title').text(fixture.home_team + ' vs ' + fixture.away_team);
        $('#highlight-league').text(fixture.league + ' • ' + (fixture.status === 'upcoming' ? 'Featured kickoff' : 'Live action'));
        $('#highlight-status').text(fixture.status === 'live' ? 'LIVE' : fixture.status === 'finished' ? 'FINISHED' : 'UPCOMING');
        $('#highlight-home').text(fixture.home_team);
        $('#highlight-away').text(fixture.away_team);
        $('#highlight-home-score').text(fixture.home_score !== null ? fixture.home_score : '-');
        $('#highlight-away-score').text(fixture.away_score !== null ? fixture.away_score : '-');
        $('#highlight-time').text(fixture.status === 'upcoming' ? 'Kickoff: ' + formatDate(fixture.kickoff_time) : 'Kickoff: ' + formatDate(fixture.kickoff_time));
        $('#highlight-market').text('Top market: Point Spread');
    }

    function fetchAndRenderAll() {
        $.getJSON('{{ url('api/fixtures') }}', {sport: 'american-football', status: 'all'}, function(data) {
            renderFixtures(data.filter(f => f.status === 'upcoming'), '#upcoming-fixtures');
            renderFixtures(data.filter(f => f.status === 'live'), '#live-fixtures');
            renderFixtures(data.filter(f => f.status === 'finished'), '#finished-fixtures');
            renderFeaturedGame(data[0]);
        });
    }

    function updateSlip() {
        $.getJSON('{{ url('api/bet/slip') }}', function(data) {
            var $list = $('#slip-bets');
            $list.empty();
            $('#slip-count').text(data.count);

            if(data.count === 0) {
                $list.append('<p style="text-align: center; color: #999; padding: 20px;">No bets added yet</p>');
                $('#submit-slip-btn').prop('disabled', true).css('opacity', '0.6');
            } else {
                $('#submit-slip-btn').prop('disabled', false).css('opacity', '1');
                data.bets.forEach(function(bet) {
                    var item = $('<div class="slip-item"></div>');
                    var info = $('<div class="slip-item-info"></div>');
                    info.append('<div class="slip-item-match">' + bet.fixture.home_team + ' vs ' + bet.fixture.away_team + '</div>');
                    info.append('<div class="slip-item-odd">' + bet.selection + ' @ ' + bet.odds + '</div>');
                    item.append(info);
                    var remove = $('<span class="slip-item-remove" data-bet-id="' + bet.id + '">×</span>');
                    item.append(remove);
                    $list.append(item);
                });
            }

            $('#total-stake').text('$' + data.total_stake.toFixed(2));
            $('#total-odds').text(data.total_odds.toFixed(2) + 'x');
            $('#potential-return').text('$' + data.total_return.toFixed(2));
        });
    }

    $('body').on('click', '.odd-btn', function() {
        var $this = $(this);
        var fixtureId = $this.data('fixture-id');
        var selection = $this.data('selection');
        var odds = $this.data('odds');

        $.ajax({
            url: '{{ url('api/bet/place') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            data: {
                fixture_id: fixtureId,
                market: $this.data('market'),
                selection: selection,
                odds: odds,
                stake: parseFloat($('#stake-input').val())
            },
            success: function() {
                $this.addClass('selected');
                updateSlip();
            },
            error: function() {
                swal('Error', 'Please login first', 'error');
            }
        });
    });

    $('body').on('click', '.slip-item-remove', function() {
        var betId = $(this).data('bet-id');
        $.ajax({
            url: '{{ url('api/bet/remove') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            data: {bet_id: betId},
            success: function() {
                updateSlip();
            }
        });
    });

    $('#clear-slip-btn').on('click', function(e) {
        e.preventDefault();
        $.getJSON('{{ url('api/bet/slip') }}', function(data) {
            data.bets.forEach(function(bet) {
                $.ajax({
                    url: '{{ url('api/bet/remove') }}',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': csrfToken},
                    data: {bet_id: bet.id},
                    async: false
                });
            });
            updateSlip();
        });
    });

    $('#submit-slip-btn').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ url('api/bet/submit') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            success: function() {
                swal('Success!', 'Your bet slip has been submitted', 'success');
                setTimeout(function() { updateSlip(); }, 800);
            },
            error: function() {
                swal('Error', 'Failed to submit bets', 'error');
            }
        });
    });

    fetchAndRenderAll();
    updateSlip();
});
</script>