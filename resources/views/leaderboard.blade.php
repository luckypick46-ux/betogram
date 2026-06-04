@include('common/header_link')
    <!-- Sidebar -->
    @include('common/leftbar')
    <!-- Page Content -->
      <div class="bog_content">
          <!-- Page header top -->
              @include('common/register_header')  
            @if (session('status'))
            <div class="alert alert-danger" style="text-align:center">
                {{ session('status') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success" style="text-align:center">
                {{ session('success') }}
            </div>
            @endif
          <!-- Page body content -->
            <div class="container">
                <div class="row">
                  <div class="col-md-8 col-sm-7" id="content">
                     <div class="dashboard_left">
                        <div class="page-banner leaderboard-page-banner">
                          <div class="row">
                            <div class="col-md-8">
                              <h1>Leaderboard</h1>
                              <p class="lead">See the top players on Betogram and discover who is leading the pack this week, month, and all time.</p>
                            </div>
                            <div class="col-md-4 text-right hidden-sm hidden-xs">
                              <div class="leaderboard-hero-badge">
                                <span>Current Champion</span>
                                <strong>Riley Green</strong>
                                <small>10.4k points • 82% win rate</small>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="status_wrap leaderboard-status-wrap">
                          <h3>Leaderboard snapshot</h3>
                          <ul class="status_content leaderboard-status-cards">
                            <li>
                              <h4 id="summary-active">1.2K</h4>
                              <p>Active users</p>  
                            </li>
                            <li>
                              <h4 id="summary-bets">9.8K</h4>
                              <p>Live bets placed</p>  
                            </li>
                            <li>
                              <h4 id="summary-winrate">79%</h4>
                              <p>Average win rate</p>  
                            </li>
                            <li>
                              <h4 id="summary-payoff">$58.4K</h4>
                              <p>Total payouts</p>  
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>

                        <div class="leaderboard-page">
                          <div class="row leaderboard-hero">
                            <div class="col-md-8">
                              <h2 class="leaderboard-title">Top performers</h2>
                              <p class="leaderboard-subtitle">Rankings updated in real time with the most valuable wins, strongest streaks and highest scoring bettors.</p>
                            </div>
                            <div class="col-md-4 text-right leaderboard-controls-wrap">
                              <div class="btn-group" role="group" aria-label="Time range">
                                <button class="btn btn-default btn-sm active" data-range="week">This Week</button>
                                <button class="btn btn-default btn-sm" data-range="month">This Month</button>
                                <button class="btn btn-default btn-sm" data-range="all">All Time</button>
                              </div>
                            </div>
                          </div>

                          <div class="row leaderboard-top" id="leaderboard-top">
                            <!-- Top 3 will be rendered here by JS -->
                          </div>

                          <div class="row leaderboard-table-wrap">
                            <div class="col-md-12">
                              <div class="panel panel-default">
                                <div class="panel-body">
                                  <div class="table-responsive">
                                    <table class="table table-striped table-hover leaderboard-table">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Player</th>
                                          <th>Rank</th>
                                          <th>Points</th>
                                          <th>Win Rate</th>
                                          <th>Recent Activity</th>
                                        </tr>
                                      </thead>
                                      <tbody id="leaderboard-table-body">
                                        <!-- Rows will be injected here by JS -->
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
                  </div>  
                   <!-- rightbar part Start -->
                      @include('common/rightbar')
                    </div>
                </div>
            <!-- Page body content -->
        </div>
        <!-- page-content-wrapper -->
@include('common/footer_link')
<script>
  function renderLeaderboard(range) {
    $.getJSON("{{ url('api/leaderboard') }}", { range: range }, function(res) {
      var topHtml = '';
      res.top.forEach(function(u, idx) {
        var rank = idx + 1;
        var cls = rank === 1 ? 'first' : (rank === 2 ? 'second' : 'third');
        topHtml += '<div class="col-md-4">';
        topHtml += '<div class="leader-card leader-' + cls + '">';
        topHtml += '<div class="leader-rank">' + rank + '</div>';
        topHtml += '<div class="leader-info"><h4>' + u.name + '</h4><p class="small muted">' + u.level + ' • ' + u.points + ' pts</p></div>';
        topHtml += '<div class="leader-stats">' + u.win_rate + '% win rate</div>';
        topHtml += '</div></div>';
      });
      $('#leaderboard-top').html(topHtml);

      var rows = '';
      res.list.forEach(function(u) {
        rows += '<tr>';
        rows += '<td>' + u.rank + '</td>';
        rows += '<td><div class="leader-player"><h5>' + u.name + '</h5><small class="muted">' + u.level + '</small></div></td>';
        rows += '<td>' + u.level + '</td>';
        rows += '<td>' + u.points + '</td>';
        rows += '<td>' + u.win_rate + '%</td>';
        rows += '<td><small class="text-muted">' + u.last_active + ' hrs ago</small></td>';
        rows += '</tr>';
      });
      $('#leaderboard-table-body').html(rows);
    });
  }

  $(function(){
    renderLeaderboard('week');

    $(document).on('click', '.leaderboard-controls .btn', function(e){
      e.preventDefault();
      $('.leaderboard-controls .btn').removeClass('active');
      $(this).addClass('active');
      renderLeaderboard($(this).data('range') || 'week');
    });
  });
</script>
