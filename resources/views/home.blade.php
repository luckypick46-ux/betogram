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
                     <!-- top status section -->
                      <div class="status_wrap">
                          <h3>Your Status</h3>
                          <ul class="status_content">
                            <li>
                              <h4>Pro</h4>
                              <p>Level</p>  
                            </li>
                             <li>
                              <h4>67%</h4>
                              <p>Hit rate</p>  
                            </li>
                             <li>
                              <h4>200</h4>
                              <p>GramS</p>  
                            </li>
                             <li>
                              <h4>10</h4>
                              <p>Leaderboard</p>  
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                    <!-- top status section end -->
                    <!-- feed section start  -->
                      <div class="all_feed_wrap">
                          <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#news_feed" aria-controls="news_feed" role="tab" data-toggle="tab">News Feed</a></li>
                                <li role="presentation"><a href="#bets" aria-controls="bets" role="tab" data-toggle="tab">My Bets</a></li>
                                <li role="presentation"><a href="#leaderboard" aria-controls="leaderboard" role="tab" data-toggle="tab">Leaderboard</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="news_feed">
                                   <div class="row">
                                     <div class="col-md-6">
                                        <div class="row">
                                           <div class="col-sm-12 feed_left">
                                             <div class="feed_wrapper">
                                              <div class="feed_content_wrapper">
                                                  <div class="feed_profile_details">
                                                     <div class="feed_img">
                                                       <img src="{{asset('assets/front_end/images/user_img.png')}}">
                                                     </div>
                                                     <div class="feed_user_name">
                                                      <a href=""> 
                                                       <h4>Morkan Doe <span>2hrs. ago</span></h4>
                                                       <p>Place a bet via ladbrokers</p>
                                                      </a> 
                                                     </div>
                                                  </div>
                                                  <div class="feed_body">
                                                    <h4>Braga v Benfica</h4>
                                                    <p>Match Betting : <span>7th July | 20:30</span></p>
                                                  </div>
                                                  <div class="feed_chart">
                                                    <h3>Benfica <span>@2.80</span></h3>
                                                    <h3>Single <span>@2.80</span></h3>
                                                  </div>
                                                </div> 
                                                <div class="feed_social_wrap">   
                                                  <ul class="feed_social">
                                                     <li>
                                                       <a href="#">
                                                         4
                                                         <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                         Like
                                                       </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         1
                                                         <i class="fa fa-clone" aria-hidden="true"></i>
                                                         Copy
                                                       </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-facebook" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-twitter" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-share-alt" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                  </ul>
                                                 </div> 
                                                  <div class="comment_section">
                                                    <input class="form-control" type="text" name="" placeholder="Add a Comment ...">
                                                  </div>
                                                  <!-- dropdown More -->   
                                                   <div class="dropdown feed_more">
                                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                      <img src="{{asset('assets/front_end/images/arrow_down.png')}}">
                                                      </a>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Demo </a></li>
                                                        <li><a href="#">Demo </a></li>
                                                        <li><a href="#">Demo</a></li>
                                                      </ul>
                                                  </div>
                                                <!-- dropdown More -->  
                                                </div>  
                                              </div>
                                          <div class="col-sm-12 feed_left win">
                                             <div class="feed_wrapper">
                                              <div class="feed_content_wrapper">
                                                  <div class="feed_profile_details">
                                                     <div class="feed_img">
                                                       <img src="{{asset('assets/front_end/images/user_img.png')}}">
                                                     </div>
                                                     <div class="feed_user_name">
                                                      <a href=""> 
                                                       <h4>Morkan Doe <span>2hrs. ago</span></h4>
                                                       <p>Place a bet via ladbrokers</p>
                                                      </a> 
                                                     </div>
                                                  </div>
                                                  <div class="feed_body">
                                                    <h4>Braga v Benfica</h4>
                                                    <p>Match Betting : <span>7th July | 20:30</span></p>
                                                  </div>
                                                  <div class="feed_chart">
                                                    <h3>Benfica <span>@2.80</span></h3>
                                                    <h3>Single <span>@2.80</span></h3>
                                                  </div>
                                                </div> 
                                                <div class="feed_social_wrap">   
                                                  <ul class="feed_social">
                                                     <li>
                                                       <a href="#">
                                                         4
                                                         <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                         Like
                                                       </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         1
                                                         <i class="fa fa-clone" aria-hidden="true"></i>
                                                         Copy
                                                       </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-facebook" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-twitter" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-share-alt" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                  </ul>
                                                 </div> 
                                                  <div class="comment_section">
                                                    <input class="form-control" type="text" name="" placeholder="Add a Comment ...">
                                                  </div>
                                                  <!-- dropdown More -->   
                                                   <div class="dropdown feed_more">
                                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                      <img src="{{asset('assets/front_end/images/arrow_down.png')}}">
                                                      </a>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Demo </a></li>
                                                        <li><a href="#">Demo </a></li>
                                                        <li><a href="#">Demo</a></li>
                                                      </ul>
                                                  </div>
                                                <!-- dropdown More -->  
                                                </div>  
                                              </div>
                                        </div>
                                     </div>
                                     <div class="col-md-6 ">
                                        <div class="row">
                                          <div class="col-sm-12 feed_right loss">
                                             <div class="feed_wrapper">
                                              <div class="feed_content_wrapper">
                                                  <div class="feed_profile_details">
                                                     <div class="feed_img">
                                                       <img src="{{asset('assets/front_end/images/user_img.png')}}">
                                                     </div>
                                                     <div class="feed_user_name">
                                                      <a href=""> 
                                                       <h4>Morkan Doe <span>2hrs. ago</span></h4>
                                                       <p>Place a bet via ladbrokers</p>
                                                      </a> 
                                                     </div>
                                                  </div>
                                                  <div class="feed_body">
                                                    <h4>Braga v Benfica</h4>
                                                    <p>Match Betting : <span>7th July | 20:30</span></p>
                                                  </div>
                                                  <div class="feed_chart">
                                                    <h3>Benfica <span>@2.80</span></h3>
                                                    <h3>Single <span>@2.80</span></h3>
                                                  </div>
                                                </div> 
                                                <div class="feed_social_wrap">   
                                                  <ul class="feed_social">
                                                     <li>
                                                       <a href="#">
                                                         4
                                                         <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                         Like
                                                       </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         1
                                                         <i class="fa fa-clone" aria-hidden="true"></i>
                                                         Copy
                                                       </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-facebook" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-twitter" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-share-alt" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                  </ul>
                                                 </div> 
                                                  <div class="comment_section">
                                                    <input class="form-control" type="text" name="" placeholder="Add a Comment ...">
                                                  </div>
                                              <!-- dropdown More -->   
                                                 <div class="dropdown feed_more">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    <img src="{{asset('assets/front_end/images/arrow_down.png')}}">
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                      <li><a href="#">Demo </a></li>
                                                      <li><a href="#">Demo </a></li>
                                                      <li><a href="#">Demo</a></li>
                                                    </ul>
                                                </div>
                                              <!-- dropdown More -->   
                                             </div>  
                                          </div>
                                          <div class="col-sm-12 feed_right draw">
                                             <div class="feed_wrapper">
                                              <div class="feed_content_wrapper">
                                                  <div class="feed_profile_details">
                                                     <div class="feed_img">
                                                       <img src="{{asset('assets/front_end/images/user_img.png')}}">
                                                     </div>
                                                     <div class="feed_user_name">
                                                      <a href=""> 
                                                       <h4>Morkan Doe <span>2hrs. ago</span></h4>
                                                       <p>Place a bet via ladbrokers</p>
                                                      </a> 
                                                     </div>
                                                  </div>
                                                  <div class="feed_body">
                                                    <h4>Braga v Benfica</h4>
                                                    <p>Match Betting : <span>7th July | 20:30</span></p>
                                                  </div>
                                                  <div class="feed_chart">
                                                    <h3>Benfica <span>@2.80</span></h3>
                                                    <h3>Single <span>@2.80</span></h3>
                                                  </div>
                                                </div> 
                                                <div class="feed_social_wrap">   
                                                  <ul class="feed_social">
                                                     <li>
                                                       <a href="#">
                                                         4
                                                         <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                         Like
                                                       </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         1
                                                         <i class="fa fa-clone" aria-hidden="true"></i>
                                                         Copy
                                                       </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-facebook" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-twitter" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                     <li>
                                                       <a href="#">
                                                         <i class="fa fa-share-alt" aria-hidden="true"></i>
                                                      </a>
                                                     </li>
                                                  </ul>
                                                 </div> 
                                                  <div class="comment_section">
                                                    <input class="form-control" type="text" name="" placeholder="Add a Comment ...">
                                                  </div>
                                              <!-- dropdown More -->   
                                                 <div class="dropdown feed_more">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    <img src="{{asset('assets/front_end/images/arrow_down.png')}}">
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                      <li><a href="#">Demo </a></li>
                                                      <li><a href="#">Demo </a></li>
                                                      <li><a href="#">Demo</a></li>
                                                    </ul>
                                                </div>
                                              <!-- dropdown More -->   
                                             </div>  
                                          </div>
                                        </div>  
                                     </div>
                                   </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="bets">
                                </div>
                                <div role="tabpanel" class="tab-pane" id="leaderboard">
                                  <div class="leaderboard-page">
                                    <div class="row leaderboard-hero">
                                      <div class="col-md-8">
                                        <h2 class="leaderboard-title">Leaderboard</h2>
                                        <p class="leaderboard-subtitle">Top performers on Betogram. Track rankings, wins, and recent activity across weekly, monthly and all-time leaderboards.</p>
                                      </div>
                                      <div class="col-md-4 text-right leaderboard-controls">
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
                                                    <th>User</th>
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
                      </div>
                    <!-- feed section end  -->
                      <div class="clearfix"></div>
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
  $(document).ready(function(){
	setTimeout(function() {
		$('.alert-danger').fadeOut('fast');
        $('.alert-success').fadeOut('fast');
	}, 4000);
  });
</script>
<script>
  // Leaderboard fetch + render (mock API)
  function renderLeaderboard(range) {
    $.getJSON("{{ url('api/leaderboard') }}", { range: range }, function(res) {
      // Top 3
      var topHtml = '';
      res.top.forEach(function(u, idx) {
        var rank = idx + 1;
        var cls = rank === 1 ? 'first' : (rank === 2 ? 'second' : 'third');
        topHtml += '<div class="col-md-4">';
        topHtml += '<div class="leader-card leader-' + cls + '">';
        topHtml += '<div class="leader-rank">' + rank + '</div>';
        topHtml += '<div class="leader-avatar"><img src="' + u.avatar + '" alt="' + u.name + '"></div>';
        topHtml += '<div class="leader-info"><h4>' + u.name + '</h4><p class="small muted">' + u.level + ' • ' + u.points + ' points</p></div>';
        topHtml += '<div class="leader-stats">' + u.win_rate + '% win rate</div>';
        topHtml += '</div></div>';
      });
      $('#leaderboard-top').html(topHtml);

      // Table
      var rows = '';
      res.list.forEach(function(u, i) {
        rows += '<tr>';
        rows += '<td>' + u.rank + '</td>';
        rows += '<td><div class="media"><div class="media-left"><img class="media-object img-circle" src="' + u.avatar + '" style="width:40px;height:40px;" alt="' + u.name + '"></div><div class="media-body"><h5 class="media-heading">' + u.name + '</h5><small class="muted">Level ' + u.level + '</small></div></div></td>';
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
    // initial load
    renderLeaderboard('week');

    // time range buttons
    $(document).on('click', '.leaderboard-controls .btn', function(e){
      e.preventDefault();
      $('.leaderboard-controls .btn').removeClass('active');
      $(this).addClass('active');
      var range = $(this).data('range') || 'week';
      renderLeaderboard(range);
    });
  });
</script>
<script>
  // Ensure Leaderboard tab activates even if Bootstrap tab plugin fails
  $(document).on('click', 'a[href="#leaderboard"]', function(e){
    console.log('Leaderboard tab clicked');
    e.preventDefault();
    var $anchor = $(this);
    try{
      if ($anchor.tab) {
        $anchor.tab('show');
      } else {
        $('.tab-content .tab-pane').removeClass('active');
        $('#leaderboard').addClass('active');
      }
    } catch(err) {
      // fallback
      $('.tab-content .tab-pane').removeClass('active');
      $('#leaderboard').addClass('active');
    }
    // render leaderboard content after activation
    var currentRange = $('.leaderboard-controls .btn.active').data('range') || 'week';
    renderLeaderboard(currentRange);
  });
</script>