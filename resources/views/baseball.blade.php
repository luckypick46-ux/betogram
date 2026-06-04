@include('common/header_link')
    @include('common/leftbar')
    <div class="bog_content">
        @include('common/register_header')
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="baseball-featured-card" id="featured-baseball-game">
                        <div class="featured-top">
                            <div>
                                <span class="featured-label">Featured Game</span>
                                <h3 id="featured-baseball-title">Loading top baseball game...</h3>
                                <p id="featured-baseball-league" class="featured-meta">Premium matchup highlight</p>
                            </div>
                            <div class="featured-status" id="featured-baseball-status">UPCOMING</div>
                        </div>
                        <div class="featured-details">
                            <div class="featured-team-block">
                                <strong id="featured-baseball-home">Home Team</strong>
                                <span id="featured-baseball-home-score">0</span>
                            </div>
                            <div class="featured-vs">vs</div>
                            <div class="featured-team-block">
                                <strong id="featured-baseball-away">Away Team</strong>
                                <span id="featured-baseball-away-score">0</span>
                            </div>
                        </div>
                        <div class="featured-meta-row">
                            <span id="featured-baseball-time">Game time</span>
                            <span id="featured-baseball-market">Top market: Moneyline</span>
                        </div>
                    </div>

                    <!-- Betting Filter Tabs -->
                    <div class="all_feed_wrap">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#upcoming-matches" data-status="upcoming" role="tab" data-toggle="tab"><i class="fa fa-calendar"></i> Upcoming</a></li>
                            <li role="presentation"><a href="#live-matches" data-status="live" role="tab" data-toggle="tab"><i class="fa fa-play-circle"></i> Live</a></li>
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

                <!-- Professional Betting Slip -->
                <div class="col-md-3">
                    <div class="betingtab" style="position: sticky; top: 90px;">
                        <h3 style="padding: 15px; margin: 0; border-bottom: 1px solid #bedbcb; display: flex; justify-content: space-between; align-items: center;">
                            <span><i class="fa fa-list"></i> Bet Slip</span>
                            <span id="slip-count" class="badge" style="background: #d9534f; color: #fff; padding: 4px 8px; border-radius: 3px; font-size: 11px; font-weight: 600;">0</span>
                        </h3>
                        
                        <div id="slip-bets" class="slip-content" style="max-height: 350px; overflow-y: auto; padding: 0;">
                            <p style="text-align: center; color: #999; padding: 20px;">No bets added yet</p>
                        </div>

                        <div style="padding: 15px; border-top: 1px solid #bedbcb; background: #fafafa;">
                            <div class="slip-summary-item">
                                <span>Total Stake:</span>
                                <strong id="total-stake">$0.00</strong>
                            </div>
                            <div class="slip-summary-item">
                                <span>Total Odds:</span>
                                <strong id="total-odds">0.00x</strong>
                            </div>
                            <div class="slip-summary-item" style="border-top: 1px solid #d0d7de; padding-top: 10px; margin-top: 10px;">
                                <span style="font-weight: 600;">Potential Return:</span>
                                <strong id="potential-return" style="color: #1d8d70; font-size: 16px;">$0.00</strong>
                            </div>

                            <!-- Stake Input Section -->
                            <div style="margin-top: 15px;">
                                <label style="font-size: 12px; font-weight: 600; color: #333; margin-bottom: 8px; display: block;">Stake Per Bet (USD)</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" id="stake-input" class="form-control" value="10" min="1" max="10000" step="5" style="border: 1px solid #b8b8b8; height: 40px; border-radius: 0 2px 2px 0;">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div style="margin-top: 12px;">
                                <a href="#" id="submit-slip-btn" class="btn btn-deposit btn-block" style="background: #1d814b; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block; width: 100%; box-sizing: border-box; border: none; margin-bottom: 8px; transition: all 0.2s ease;">Place Bets</a>
                                <a href="#" id="clear-slip-btn" class="btn btn-default btn-block" style="background: #e8e8e8; color: #333; padding: 10px; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block; width: 100%; box-sizing: border-box; border: 1px solid #c0c0c0; transition: all 0.2s ease;">Clear Slip</a>
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
.fixture-card-item { background: #fff; border: 1px solid #bedbcb; border-radius: 3px; padding: 15px; display: flex; flex-direction: column; box-shadow: 0 0 2px #959595; transition: all 0.2s ease; }
.fixture-card-item:hover { box-shadow: 0 2px 6px #b0b0b0; }
.fixture-league-label { font-size: 11px; color: #999; text-transform: uppercase; font-weight: 600; margin-bottom: 8px; }
.fixture-match-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
.fixture-teams { flex: 1; }
.fixture-team-pair { font-weight: 600; color: #147541; font-size: 14px; line-height: 20px; margin-bottom: 4px; }
.fixture-time-info { font-size: 12px; color: #666; }
.fixture-score-info { font-size: 14px; font-weight: 700; color: #333; margin-top: 4px; }
.fixture-status { display: inline-block; padding: 2px 8px; border-radius: 12px; font-size: 9px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; margin-right: 8px; }
.fixture-status.live { background: #d9534f; color: #fff; }
.fixture-status.finished { background: #343a40; color: #fff; }
.fixture-status.upcoming { background: #1d814b; color: #fff; }
.fixture-market { margin-top: 16px; }
.fixture-market-title { font-size: 12px; color: #147541; font-weight: 700; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.4px; }
.fixture-odds-grid { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px; }
.odd-btn { flex: 1 1 110px; min-width: 110px; padding: 8px 6px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 2px; text-align: center; cursor: pointer; transition: all 0.2s ease; font-size: 12px; }
.odd-btn:hover { background: #e8f3f0; border-color: #1d814b; }
.odd-btn.selected { background: #1d814b; color: #fff; border-color: #1d814b; }
.odd-label { font-size: 10px; color: #666; margin-bottom: 2px; }
.odd-value { font-weight: 700; color: #333; font-size: 13px; }
.odd-btn.selected .odd-label { color: #ddd; }
.odd-btn.selected .odd-value { color: #fff; }

.baseball-featured-card { background: linear-gradient(180deg, rgba(7,17,38,0.74), rgba(7,17,38,0.64)), url('{{ asset('assets/front_end/images/football_color.png') }}') center/cover no-repeat; border: 1px solid rgba(255,255,255,0.18); border-radius: 16px; padding: 22px; margin-bottom: 18px; box-shadow: 0 20px 36px rgba(0,0,0,0.16); position: relative; overflow: hidden; color: #fff; }
.baseball-featured-card::after { content: ''; position: absolute; inset: 0; background-image: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.18), transparent 22%), radial-gradient(circle at 85% 15%, rgba(255,255,255,0.12), transparent 18%); opacity: 0.48; pointer-events: none; }
.featured-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; margin-bottom: 16px; position: relative; z-index: 1; }
.featured-label { display: inline-block; font-size: 11px; color: #b8d8ff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 4px; }
.featured-status { background: rgba(255,255,255,0.16); color: #f5f9ff; padding: 6px 14px; border-radius: 999px; font-size: 12px; font-weight: 700; text-transform: uppercase; }
.featured-details { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 14px; position: relative; z-index: 1; }
.featured-team-block { flex: 1; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.14); border-radius: 10px; padding: 16px; text-align: center; }
.featured-team-block strong { display: block; font-size: 14px; color: #f5f9ff; margin-bottom: 8px; }
.featured-team-block span { display: inline-flex; justify-content: center; align-items: center; width: 44px; height: 44px; border-radius: 50%; background: rgba(255,255,255,0.12); color: #fff; font-size: 18px; font-weight: 700; }
.featured-vs { min-width: 60px; text-align: center; color: #d4e2ff; font-size: 13px; font-weight: 700; }
.featured-meta-row { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px; font-size: 12px; color: #d4e2ff; position: relative; z-index: 1; }

.slip-summary-item { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 13px; }
.slip-content { border-top: 1px solid #bedbcb; background: #fafafa; }
.slip-item { display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #d0d7de; background: #fff; }
.slip-item-info { flex: 1; }
.slip-item-match { font-size: 12px; font-weight: 600; color: #147541; }
.slip-item-odd { font-size: 11px; color: #666; }
.slip-item-remove { cursor: pointer; color: #d9534f; font-weight: 600; font-size: 16px; line-height: 1; }

#submit-slip-btn:hover { background: #0b542d !important; }
#clear-slip-btn:hover { background: #d8d8d8 !important; }

@media (max-width: 768px) {
    .col-md-9, .col-md-3 { margin-bottom: 20px; }
    .fixture-match-row { flex-direction: column; }
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
        if(!fixture.odds || !fixture.odds.length) return null;
        return fixture.odds.find(function(o){ return o.market === market && o.selection === selection; });
    }

    function formatOdds(value) {
        return parseFloat(value).toFixed(2);
    }

    function buildFallbackOdd(market, selection) {
        var value = 1.80;
        if(market === 'moneyline') {
            if(selection === '1') value = 1.95;
            if(selection === '2') value = 2.05;
        }
        if(market === 'runline') {
            value = 1.90;
        }
        if(market === 'totals') {
            value = selection && selection.indexOf('O') === 0 ? 1.75 : 2.05;
        }
        return { odds_value: value };
    }

    function renderMarketButtons(fixture, marketKey, marketTitle, selections) {
        var marketSection = $('<div class="fixture-market"></div>');
        marketSection.append('<div class="fixture-market-title">' + marketTitle + '</div>');
        var optionsRow = $('<div class="fixture-odds-grid"></div>');

        selections.forEach(function(sel){
            var oddObj = getFixtureOdd(fixture, marketKey, sel.selection) || buildFallbackOdd(marketKey, sel.selection);
            var btn = $('<div class="odd-btn" data-fixture-id="' + fixture.id + '" data-market="' + marketKey + '" data-selection="' + sel.selection + '" data-odds="' + formatOdds(oddObj.odds_value) + '"></div>');
            btn.append('<div class="odd-label">' + sel.label + '</div>');
            btn.append('<div class="odd-value">@ ' + formatOdds(oddObj.odds_value) + '</div>');
            optionsRow.append(btn);
        });

        marketSection.append(optionsRow);
        return marketSection;
    }

    function renderFixtures(fixtures, containerId){
        var $container = $(containerId);
        $container.empty();

        if(!fixtures || fixtures.length === 0){
            $container.append('<p style="text-align:center;color:#999;padding:30px;">No matches available</p>');
            return;
        }

        fixtures.forEach(function(fixture){
            var card = $('<div class="fixture-card-item"></div>');
            var leagueLabel = $('<div class="fixture-league-label"><i class="fa fa-flag"></i> ' + fixture.league + '</div>');
            card.append(leagueLabel);

            var matchRow = $('<div class="fixture-match-row"></div>');
            var teamsDiv = $('<div class="fixture-teams"></div>');
            teamsDiv.append('<div class="fixture-team-pair">' + (fixture.home_team||fixture.home_player||'Home') + ' v ' + (fixture.away_team||fixture.away_player||'Away') + '</div>');

            var statusBadge = fixture.status === 'live' ? '<span class="fixture-status live">LIVE</span>' : fixture.status === 'finished' ? '<span class="fixture-status finished">FT</span>' : '<span class="fixture-status upcoming">UPCOMING</span>';

            var statusInfo = fixture.status === 'upcoming' ? '<div class="fixture-time-info"><i class="fa fa-clock-o"></i> ' + formatDate(fixture.kickoff_time||fixture.start_time) + '</div>' : '<div class="fixture-score-info">' + statusBadge + ' <strong>' + (fixture.home_score||0) + ' - ' + (fixture.away_score||0) + '</strong></div>';

            teamsDiv.append(statusInfo);
            matchRow.append(teamsDiv);
            card.append(matchRow);

            card.append(renderMarketButtons(fixture, 'moneyline', 'Moneyline', [
                { label: fixture.home_team||'Home', selection: '1' },
                { label: fixture.away_team||'Away', selection: '2' }
            ]));

            card.append(renderMarketButtons(fixture, 'runline', 'Run Line (Spread)', [
                { label: fixture.home_team + ' -1.5', selection: '1' },
                { label: fixture.away_team + ' +1.5', selection: '2' }
            ]));

            card.append(renderMarketButtons(fixture, 'totals', 'Total Runs Over/Under', [
                { label: 'O8.5', selection: 'O8.5' },
                { label: 'U8.5', selection: 'U8.5' },
                { label: 'O9.5', selection: 'O9.5' },
                { label: 'U9.5', selection: 'U9.5' }
            ]));

            $container.append(card);
        });
    }

    function renderFeaturedGame(fixture) {
        if(!fixture) {
            $('#featured-baseball-title').text('No featured game available');
            $('#featured-baseball-league').text('Check back soon for premium fixtures');
            $('#featured-baseball-status').text('UPCOMING');
            $('#featured-baseball-home').text('Home');
            $('#featured-baseball-away').text('Away');
            $('#featured-baseball-home-score').text('-');
            $('#featured-baseball-away-score').text('-');
            $('#featured-baseball-time').text('Awaiting next highlight');
            $('#featured-baseball-market').text('Top market: Moneyline');
            return;
        }

        $('#featured-baseball-title').text((fixture.home_team||fixture.home_player||'Home') + ' vs ' + (fixture.away_team||fixture.away_player||'Away'));
        $('#featured-baseball-league').text((fixture.league||'') + ' featured match');
        $('#featured-baseball-status').text(fixture.status === 'live' ? 'LIVE' : fixture.status === 'finished' ? 'FINISHED' : 'UPCOMING');
        $('#featured-baseball-home').text(fixture.home_team||fixture.home_player||'Home');
        $('#featured-baseball-away').text(fixture.away_team||fixture.away_player||'Away');
        $('#featured-baseball-home-score').text(fixture.status !== 'upcoming' ? (fixture.home_score || 0) : '-');
        $('#featured-baseball-away-score').text(fixture.status !== 'upcoming' ? (fixture.away_score || 0) : '-');
        $('#featured-baseball-time').text(fixture.status === 'upcoming' ? 'Start: ' + formatDate(fixture.kickoff_time || fixture.start_time) : 'Started: ' + formatDate(fixture.kickoff_time || fixture.start_time));
        $('#featured-baseball-market').text('Top market: Moneyline');
    }

    function fetchAndRenderAll() {
        $.getJSON('{{ url('api/fixtures') }}', {sport: 'baseball', status: 'all'}, function(data) {
            renderFixtures(data.filter(f => f.status === 'upcoming'), '#upcoming-fixtures');
            renderFixtures(data.filter(f => f.status === 'live'), '#live-fixtures');
            renderFixtures(data.filter(f => f.status === 'finished'), '#finished-fixtures');
            var featured = data.find(f => f.status === 'live') || data.find(f => f.status === 'upcoming') || data[0];
            renderFeaturedGame(featured);
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
                    info.append('<div class="slip-item-match">' + (bet.fixture.home_team||bet.fixture.home_player) + ' v ' + (bet.fixture.away_team||bet.fixture.away_player) + '</div>');
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

    // Add bet
    $('body').on('click', '.odd-btn', function() {
        var $btn = $(this);
        var fixtureId = $btn.data('fixture-id');
        var selection = $btn.data('selection');
        var odds = $btn.data('odds');

        $.ajax({
            url: '{{ url('api/bet/place') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            data: {
                fixture_id: fixtureId,
                market: $btn.data('market'),
                selection: selection,
                odds: odds,
                stake: parseFloat($('#stake-input').val())
            },
            success: function() {
                $btn.addClass('selected');
                updateSlip();
            },
            error: function() {
                swal('Error', 'Please login first', 'error');
            }
        });
    });

    // Remove bet
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

    // Clear slip
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

    // Submit slip
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

    // Init
    fetchAndRenderAll();
    updateSlip();
});
</script>
@include('common/header_link')
    @include('common/leftbar')
    <div class="bog_content">
        @include('common/register_header')
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="baseball-featured-card" id="featured-baseball-game">
                        <div class="featured-top">
                            <div>
                                <span class="featured-label">Featured Baseball</span>
                                <h3 id="featured-baseball-title">Loading top baseball game...</h3>
                                <p id="featured-baseball-league" class="featured-meta">Premium game highlight</p>
                            </div>
                            <div class="featured-status" id="featured-baseball-status">UPCOMING</div>
                        </div>
                        <div class="featured-details">
                            <div class="featured-team-block">
                                <strong id="featured-baseball-home">Home Team</strong>
                                <span id="featured-baseball-home-score">0</span>
                            </div>
                            <div class="featured-vs">vs</div>
                            <div class="featured-team-block">
                                <strong id="featured-baseball-away">Away Team</strong>
                                <span id="featured-baseball-away-score">0</span>
                            </div>
                        </div>
                        <div class="featured-meta-row">
                            <span id="featured-baseball-time">Game time</span>
                            <span id="featured-baseball-market">Top market: Moneyline</span>
                        </div>
                    </div>

                    <!-- Betting Filter Tabs -->
                    <div class="all_feed_wrap">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#upcoming-matches" data-status="upcoming" role="tab" data-toggle="tab"><i class="fa fa-calendar"></i> Upcoming</a></li>
                            <li role="presentation"><a href="#live-matches" data-status="live" role="tab" data-toggle="tab"><i class="fa fa-play-circle"></i> Live</a></li>
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

                <!-- Professional Betting Slip -->
                <div class="col-md-3">
                    <div class="betingtab" style="position: sticky; top: 90px;">
                        <h3 style="padding: 15px; margin: 0; border-bottom: 1px solid #bedbcb; display: flex; justify-content: space-between; align-items: center;">
                            <span><i class="fa fa-list"></i> Bet Slip</span>
                            <span id="slip-count" class="badge" style="background: #d9534f; color: #fff; padding: 4px 8px; border-radius: 3px; font-size: 11px; font-weight: 600;">0</span>
                        </h3>
                        
                        <div id="slip-bets" class="slip-content" style="max-height: 350px; overflow-y: auto; padding: 0;">
                            <p style="text-align: center; color: #999; padding: 20px;">No bets added yet</p>
                        </div>

                        <div style="padding: 15px; border-top: 1px solid #bedbcb; background: #fafafa;">
                            <div class="slip-summary-item">
                                <span>Total Stake:</span>
                                <strong id="total-stake">$0.00</strong>
                            </div>
                            <div class="slip-summary-item">
                                <span>Total Odds:</span>
                                <strong id="total-odds">0.00x</strong>
                            </div>
                            <div class="slip-summary-item" style="border-top: 1px solid #d0d7de; padding-top: 10px; margin-top: 10px;">
                                <span style="font-weight: 600;">Potential Return:</span>
                                <strong id="potential-return" style="color: #1d8d70; font-size: 16px;">$0.00</strong>
                            </div>

                            <!-- Stake Input Section -->
                            <div style="margin-top: 15px;">
                                <label style="font-size: 12px; font-weight: 600; color: #333; margin-bottom: 8px; display: block;">Stake Per Bet (USD)</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" id="stake-input" class="form-control" value="10" min="1" max="10000" step="5" style="border: 1px solid #b8b8b8; height: 40px; border-radius: 0 2px 2px 0;">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div style="margin-top: 12px;">
                                <a href="#" id="submit-slip-btn" class="btn btn-deposit btn-block" style="background: #1d814b; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block; width: 100%; box-sizing: border-box; border: none; margin-bottom: 8px; transition: all 0.2s ease;">Place Bets</a>
                                <a href="#" id="clear-slip-btn" class="btn btn-default btn-block" style="background: #e8e8e8; color: #333; padding: 10px; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block; width: 100%; box-sizing: border-box; border: 1px solid #c0c0c0; transition: all 0.2s ease;">Clear Slip</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('common/footer_link')

<style>
/* Reuse same styles as other sports for consistent professional look */
.fixtures-list { display: flex; flex-direction: column; gap: 12px; }
.fixture-card-item { background: #fff; border: 1px solid #bedbcb; border-radius: 3px; padding: 15px; display: flex; flex-direction: column; box-shadow: 0 0 2px #959595; transition: all 0.2s ease; }
.fixture-card-item:hover { box-shadow: 0 2px 6px #b0b0b0; }
.fixture-league-label { font-size: 11px; color: #999; text-transform: uppercase; font-weight: 600; margin-bottom: 8px; }
.fixture-match-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
.fixture-teams { flex: 1; }
.fixture-team-pair { font-weight: 600; color: #147541; font-size: 14px; line-height: 20px; margin-bottom: 4px; }
.fixture-time-info { font-size: 12px; color: #666; }
.fixture-score-info { font-size: 14px; font-weight: 700; color: #333; margin-top: 4px; }
.fixture-status { display: inline-block; padding: 2px 8px; border-radius: 12px; font-size: 9px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; margin-right: 8px; }
.fixture-status.live { background: #d9534f; color: #fff; }
.fixture-status.finished { background: #343a40; color: #fff; }
.fixture-status.upcoming { background: #1d814b; color: #fff; }
.fixture-market { margin-top: 16px; }
.fixture-market-title { font-size: 12px; color: #147541; font-weight: 700; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.4px; }
.fixture-odds-grid { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px; }
.odd-btn { flex: 1 1 110px; min-width: 110px; padding: 8px 6px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 2px; text-align: center; cursor: pointer; transition: all 0.2s ease; font-size: 12px; }
.odd-btn:hover { background: #e8f3f0; border-color: #1d814b; }
.odd-btn.selected { background: #1d814b; color: #fff; border-color: #1d814b; }
.odd-label { font-size: 10px; color: #666; margin-bottom: 2px; }
.odd-value { font-weight: 700; color: #333; font-size: 13px; }
.odd-btn.selected .odd-label { color: #ddd; }
.odd-btn.selected .odd-value { color: #fff; }

.baseball-featured-card { background: linear-gradient(180deg, rgba(7,17,38,0.74), rgba(7,17,38,0.64)), url('{{ asset('assets/front_end/images/football_color.png') }}') center/cover no-repeat; border: 1px solid rgba(255,255,255,0.18); border-radius: 16px; padding: 22px; margin-bottom: 18px; box-shadow: 0 20px 36px rgba(0,0,0,0.16); position: relative; overflow: hidden; color: #fff; }
.baseball-featured-card::after { content: ''; position: absolute; inset: 0; background-image: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.18), transparent 22%), radial-gradient(circle at 85% 15%, rgba(255,255,255,0.12), transparent 18%); opacity: 0.48; pointer-events: none; }
.featured-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; margin-bottom: 16px; position: relative; z-index: 1; }
.featured-label { display: inline-block; font-size: 11px; color: #b8d8ff; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 4px; }
.featured-status { background: rgba(255,255,255,0.16); color: #f5f9ff; padding: 6px 14px; border-radius: 999px; font-size: 12px; font-weight: 700; text-transform: uppercase; }
.featured-details { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 14px; position: relative; z-index: 1; }
.featured-team-block { flex: 1; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.14); border-radius: 10px; padding: 16px; text-align: center; }
.featured-team-block strong { display: block; font-size: 14px; color: #f5f9ff; margin-bottom: 8px; }
.featured-team-block span { display: inline-flex; justify-content: center; align-items: center; width: 44px; height: 44px; border-radius: 50%; background: rgba(255,255,255,0.12); color: #fff; font-size: 18px; font-weight: 700; }
.featured-vs { min-width: 60px; text-align: center; color: #d4e2ff; font-size: 13px; font-weight: 700; }
.featured-meta-row { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px; font-size: 12px; color: #d4e2ff; position: relative; z-index: 1; }

.slip-summary-item { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 13px; }
.slip-content { border-top: 1px solid #bedbcb; background: #fafafa; }
.slip-item { display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #d0d7de; background: #fff; }
.slip-item-info { flex: 1; }
.slip-item-match { font-size: 12px; font-weight: 600; color: #147541; }
.slip-item-odd { font-size: 11px; color: #666; }
.slip-item-remove { cursor: pointer; color: #d9534f; font-weight: 600; font-size: 16px; line-height: 1; }

#submit-slip-btn:hover { background: #0b542d !important; }
#clear-slip-btn:hover { background: #d8d8d8 !important; }

@media (max-width: 768px) {
    .col-md-9, .col-md-3 { margin-bottom: 20px; }
    .fixture-match-row { flex-direction: column; }
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

    function buildFallbackOdd(fixture, market, selection) {
        var value = 1.80;
        if(market === '1x2') {
            if(selection === '1') value = 1.90;
            else if(selection === 'X') value = 3.20;
            else if(selection === '2') value = 2.70;
        }
        if(market === 'totals') {
            var threshold = parseFloat(selection.slice(1));
            if(selection[0] === 'O') {
                value = 1.30 + (threshold * 0.15);
            } else {
                value = 1.10 + (threshold * 0.13);
            }
        }
        if(market === 'run_line') {
            value = selection === 'Home' ? 1.95 : 1.95;
        }
        return { odds_value: value };
    }

    function renderMarketButtons(fixture, marketKey, marketTitle, selections) {
        var marketSection = $('<div class="fixture-market"></div>');
        marketSection.append('<div class="fixture-market-title">' + marketTitle + '</div>');
        var optionsRow = $('<div class="fixture-odds-grid"></div>');

        selections.forEach(function(sel) {
            var oddObj = getFixtureOdd(fixture, marketKey, sel.selection) || buildFallbackOdd(fixture, marketKey, sel.selection);
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
            var leagueLabel = $('<div class="fixture-league-label"><i class="fa fa-flag"></i> ' + fixture.league + '</div>');
            card.append(leagueLabel);

            var matchRow = $('<div class="fixture-match-row"></div>');
            var teamsDiv = $('<div class="fixture-teams"></div>');
            teamsDiv.append('<div class="fixture-team-pair">' + (fixture.home_team || fixture.home_player) + ' v ' + (fixture.away_team || fixture.away_player) + '</div>');

            var statusBadge = fixture.status === 'live'
                ? '<span class="fixture-status live">LIVE</span>'
                : fixture.status === 'finished'
                ? '<span class="fixture-status finished">FT</span>'
                : '<span class="fixture-status upcoming">UPCOMING</span>';

            var statusInfo = fixture.status === 'upcoming'
                ? '<div class="fixture-time-info"><i class="fa fa-clock-o"></i> ' + formatDate(fixture.kickoff_time || fixture.start_time) + '</div>'
                : '<div class="fixture-score-info">' + statusBadge + ' <strong>' + (fixture.home_score || 0) + ' - ' + (fixture.away_score || 0) + '</strong></div>';

            teamsDiv.append(statusInfo);
            matchRow.append(teamsDiv);
            card.append(matchRow);

            card.append(renderMarketButtons(fixture, '1x2', 'Moneyline', [
                { label: fixture.home_team || 'Home', selection: '1' },
                { label: fixture.away_team || 'Away', selection: '2' }
            ]));

            card.append(renderMarketButtons(fixture, 'totals', 'Total Runs Over/Under', [
                { label: 'O7.5', selection: 'O7.5' },
                { label: 'U7.5', selection: 'U7.5' },
                { label: 'O8.5', selection: 'O8.5' },
                { label: 'U8.5', selection: 'U8.5' }
            ]));

            card.append(renderMarketButtons(fixture, 'run_line', 'Run Line', [
                { label: 'Home', selection: 'Home' },
                { label: 'Away', selection: 'Away' }
            ]));

            $container.append(card);
        });
    }

    function renderFeaturedGame(fixture) {
        if(!fixture) {
            $('#featured-baseball-title').text('No featured game available');
            $('#featured-baseball-league').text('Check back soon for premium fixtures');
            $('#featured-baseball-status').text('UPCOMING');
            $('#featured-baseball-home').text('Home');
            $('#featured-baseball-away').text('Away');
            $('#featured-baseball-home-score').text('-');
            $('#featured-baseball-away-score').text('-');
            $('#featured-baseball-time').text('Awaiting next highlight');
            $('#featured-baseball-market').text('Top market: Moneyline');
            return;
        }

        $('#featured-baseball-title').text((fixture.home_team || fixture.home_player) + ' vs ' + (fixture.away_team || fixture.away_player));
        $('#featured-baseball-league').text((fixture.league || '') + ' featured match');
        $('#featured-baseball-status').text(fixture.status === 'live' ? 'LIVE' : fixture.status === 'finished' ? 'FINISHED' : 'UPCOMING');
        $('#featured-baseball-home').text(fixture.home_team || fixture.home_player);
        $('#featured-baseball-away').text(fixture.away_team || fixture.away_player);
        $('#featured-baseball-home-score').text(fixture.status !== 'upcoming' ? (fixture.home_score || 0) : '-');
        $('#featured-baseball-away-score').text(fixture.status !== 'upcoming' ? (fixture.away_score || 0) : '-');
        $('#featured-baseball-time').text(fixture.status === 'upcoming' ? 'Start: ' + formatDate(fixture.kickoff_time || fixture.start_time) : 'Started: ' + formatDate(fixture.kickoff_time || fixture.start_time));
        $('#featured-baseball-market').text('Top market: Moneyline');
    }

    function fetchAndRenderAll() {
        $.getJSON('{{ url('api/fixtures') }}', {sport: 'baseball', status: 'all'}, function(data) {
            renderFixtures(data.filter(f => f.status === 'upcoming'), '#upcoming-fixtures');
            renderFixtures(data.filter(f => f.status === 'live'), '#live-fixtures');
            renderFixtures(data.filter(f => f.status === 'finished'), '#finished-fixtures');
            var featured = data.find(f => f.status === 'live') || data.find(f => f.status === 'upcoming') || data[0];
            renderFeaturedGame(featured);
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
                    info.append('<div class="slip-item-match">' + (bet.fixture.home_team || bet.fixture.home_player) + ' v ' + (bet.fixture.away_team || bet.fixture.away_player) + '</div>');
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

    // Add bet
    $('body').on('click', '.odd-btn', function() {
        var $btn = $(this);
        var fixtureId = $btn.data('fixture-id');
        var selection = $btn.data('selection');
        var odds = $btn.data('odds');

        $.ajax({
            url: '{{ url('api/bet/place') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            data: {
                fixture_id: fixtureId,
                market: $btn.data('market'),
                selection: selection,
                odds: odds,
                stake: parseFloat($('#stake-input').val())
            },
            success: function() {
                $btn.addClass('selected');
                updateSlip();
            },
            error: function() {
                swal('Error', 'Please login first', 'error');
            }
        });
    });

    // Remove bet
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

    // Clear slip
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

    // Submit slip
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

    // Init
    fetchAndRenderAll();
    updateSlip();
});
</script>
