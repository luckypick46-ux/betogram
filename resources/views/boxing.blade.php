@include('common/header_link')
@include('common/leftbar')
<div class="bog_content">
    @include('common/register_header')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="page-header" style="margin-bottom: 24px; padding: 18px 22px; background: #fff3f6; border: 1px solid #e6c9d4; border-radius: 6px;">
                    <h2 style="margin: 0; font-size: 24px; color: #7d2233;"><i class="fa fa-hand-rock-o"></i> Boxing Betting</h2>
                    <p style="margin: 8px 0 0; color: #6b3a46; font-size: 14px; max-width: 720px;">Find upcoming title fights, live rounds, and finished results with sharp boxing markets built for modern bettors.</p>
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
                    <h3 style="padding: 15px; margin: 0; border-bottom: 1px solid #e6c9d4; display: flex; justify-content: space-between; align-items: center;">
                        <span><i class="fa fa-list"></i> Bet Slip</span>
                        <span id="slip-count" class="badge" style="background: #7d2233; color: #fff; padding: 4px 8px; border-radius: 3px; font-size: 11px; font-weight: 600;">0</span>
                    </h3>
                    
                    <div id="slip-bets" class="slip-content" style="max-height: 350px; overflow-y: auto; padding: 0;">
                        <p style="text-align: center; color: #999; padding: 20px;">No bets added yet</p>
                    </div>

                    <div style="padding: 15px; border-top: 1px solid #e6c9d4; background: #fff3f6;">
                        <div class="slip-summary-item">
                            <span>Total Stake:</span>
                            <strong id="total-stake">$0.00</strong>
                        </div>
                        <div class="slip-summary-item">
                            <span>Total Odds:</span>
                            <strong id="total-odds">0.00x</strong>
                        </div>
                        <div class="slip-summary-item" style="border-top: 1px solid #f2d9e0; padding-top: 10px; margin-top: 10px;">
                            <span style="font-weight: 600;">Potential Return:</span>
                            <strong id="potential-return" style="color: #7d2233; font-size: 16px;">$0.00</strong>
                        </div>

                        <div style="margin-top: 15px;">
                            <label style="font-size: 12px; font-weight: 600; color: #333; margin-bottom: 8px; display: block;">Stake Per Bet (USD)</label>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="number" id="stake-input" class="form-control" value="10" min="1" max="10000" step="5" style="border: 1px solid #dab2bf; height: 40px; border-radius: 0 2px 2px 0;">
                            </div>
                        </div>

                        <div style="margin-top: 12px;">
                            <a href="#" id="submit-slip-btn" class="btn btn-deposit btn-block" style="background: #7d2233; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block; width: 100%; box-sizing: border-box; border: none; margin-bottom: 8px; transition: all 0.2s ease;">Place Bets</a>
                            <a href="#" id="clear-slip-btn" class="btn btn-default btn-block" style="background: #f7d8e1; color: #7d2233; padding: 10px; border-radius: 4px; text-decoration: none; font-weight: 600; text-align: center; display: inline-block; width: 100%; box-sizing: border-box; border: 1px solid #e6c9d4; transition: all 0.2s ease;">Clear Slip</a>
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
.fixture-card-item { background: #fff; border: 1px solid #e6c9d4; border-radius: 6px; padding: 18px; display: flex; flex-direction: column; box-shadow: 0 2px 6px rgba(125, 34, 51, 0.08); transition: all 0.2s ease; }
.fixture-card-item:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(125, 34, 51, 0.12); }
.fixture-league-label { font-size: 11px; color: #8b4b5d; text-transform: uppercase; font-weight: 700; margin-bottom: 10px; }
.fixture-match-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; }
.fixture-teams { flex: 1; }
.fixture-team-pair { font-weight: 700; color: #7d2233; font-size: 15px; line-height: 22px; margin-bottom: 6px; }
.fixture-time-info { font-size: 12px; color: #6b3a46; }
.fixture-score-info { font-size: 14px; font-weight: 700; color: #3a1f28; margin-top: 4px; }
.fixture-status { display: inline-block; padding: 3px 9px; border-radius: 16px; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.4px; margin-right: 8px; }
.fixture-status.live { background: #c71f3f; color: #fff; }
.fixture-status.finished { background: #4a1f28; color: #fff; }
.fixture-status.upcoming { background: #7d2233; color: #fff; }
.fixture-market { margin-top: 16px; }
.fixture-market-title { font-size: 12px; color: #7d2233; font-weight: 700; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.4px; }
.fixture-odds-grid { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; }
.odd-btn { flex: 1 1 120px; min-width: 120px; padding: 10px 8px; background: #fff2f6; border: 1px solid #e4c5d1; border-radius: 4px; text-align: center; cursor: pointer; transition: all 0.2s ease; font-size: 13px; }
.odd-btn:hover { background: #f7d1dd; border-color: #7d2233; }
.odd-btn.selected { background: #7d2233; color: #fff; border-color: #7d2233; }
.odd-label { font-size: 11px; color: #6b3a46; margin-bottom: 4px; }
.odd-value { font-weight: 700; color: #7d2233; font-size: 14px; }
.odd-btn.selected .odd-label { color: #f7d1dd; }
.odd-btn.selected .odd-value { color: #fff; }
.slip-summary-item { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 13px; }
.slip-content { border-top: 1px solid #e6c9d4; background: #fff3f6; }
.slip-item { display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #f2d9e0; background: #fff; }
.slip-item-info { flex: 1; }
.slip-item-match { font-size: 12px; font-weight: 700; color: #7d2233; }
.slip-item-odd { font-size: 11px; color: #6b3a46; }
.slip-item-remove { cursor: pointer; color: #c71f3f; font-weight: 700; font-size: 16px; line-height: 1; }
#submit-slip-btn:hover { background: #5c1c2c !important; }
#clear-slip-btn:hover { background: #e0b7c4 !important; }
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

    function buildFallbackOdd(fixture, market, selection) {
        var value = 1.90;

        if(market === 'moneyline') {
            if(selection === '1') value = 1.80;
            else if(selection === '2') value = 2.10;
            else if(selection === 'X') value = 6.25;
        }

        if(market === 'rounds') {
            if(selection[0] === 'O') value = 1.95;
            else value = 1.75;
        }

        if(market === 'method') {
            if(selection === 'KO/TKO') value = 1.88;
            else if(selection === 'Decision') value = 2.10;
            else if(selection === 'Draw') value = 9.50;
        }

        if(market === 'finish') {
            if(selection === 'Inside Distance') value = 1.72;
            else value = 2.20;
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

            card.append(renderMarketButtons(fixture, 'moneyline', 'Fight Moneyline', [
                { label: fixture.home_team, selection: '1' },
                { label: fixture.away_team, selection: '2' },
                { label: 'Draw', selection: 'X' }
            ]));

            card.append(renderMarketButtons(fixture, 'rounds', 'Total Rounds', [
                { label: 'O7.5', selection: 'O7.5' },
                { label: 'U7.5', selection: 'U7.5' },
                { label: 'O9.5', selection: 'O9.5' },
                { label: 'U9.5', selection: 'U9.5' }
            ]));

            card.append(renderMarketButtons(fixture, 'method', 'Winning Method', [
                { label: 'KO/TKO', selection: 'KO/TKO' },
                { label: 'Decision', selection: 'Decision' },
                { label: 'Draw', selection: 'Draw' }
            ]));

            card.append(renderMarketButtons(fixture, 'finish', 'Fight Finish', [
                { label: 'Inside Distance', selection: 'Inside Distance' },
                { label: 'Decision', selection: 'Decision' }
            ]));

            $container.append(card);
        });
    }

    function fetchAndRenderAll() {
        $.getJSON('{{ url('api/fixtures') }}', {sport: 'boxing', status: 'all'}, function(data) {
            renderFixtures(data.filter(f => f.status === 'upcoming'), '#upcoming-fixtures');
            renderFixtures(data.filter(f => f.status === 'live'), '#live-fixtures');
            renderFixtures(data.filter(f => f.status === 'finished'), '#finished-fixtures');
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
