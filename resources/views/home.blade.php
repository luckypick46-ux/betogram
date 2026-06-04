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
                                  <style>
                                    .home-newsfeed .featured-match-card,
                                    .home-newsfeed .sport-card,
                                    .home-newsfeed .ad-banner,
                                    .home-newsfeed .spotlight-card {
                                      border-radius: 20px;
                                      box-shadow: 0 18px 55px rgba(0,0,0,0.12);
                                      overflow: hidden;
                                    }
                                    .home-newsfeed .featured-match-card {
                                      background: linear-gradient(135deg, #08121f 0%, #0f2a48 100%);
                                      color: #fff;
                                      padding: 30px;
                                      min-height: 420px;
                                    }
                                    .home-newsfeed .featured-match-card .match-tag {
                                      display: inline-block;
                                      margin-bottom: 18px;
                                      padding: 6px 14px;
                                      border-radius: 999px;
                                      background: rgba(255,255,255,0.08);
                                      font-size: 13px;
                                      text-transform: uppercase;
                                      letter-spacing: 1px;
                                    }
                                    .home-newsfeed .featured-match-card h3 {
                                      font-size: 34px;
                                      margin-top: 0;
                                      margin-bottom: 14px;
                                    }
                                    .home-newsfeed .featured-match-card .match-details,
                                    .home-newsfeed .featured-match-card .featured-meta {
                                      opacity: 0.8;
                                      margin-bottom: 18px;
                                    }
                                    .home-newsfeed .featured-match-card .odds-grid {
                                      margin: 24px 0;
                                    }
                                    .home-newsfeed .featured-match-card .odds-grid .odds-cell {
                                      background: rgba(255,255,255,0.08);
                                      border-radius: 16px;
                                      padding: 18px;
                                      text-align: center;
                                      color: #fff;
                                    }
                                    .home-newsfeed .featured-match-card .odds-cell h4 {
                                      margin: 0 0 6px;
                                      font-size: 16px;
                                      font-weight: 700;
                                      text-transform: uppercase;
                                      letter-spacing: .5px;
                                      opacity: .85;
                                    }
                                    .home-newsfeed .featured-match-card .odds-cell strong {
                                      display: block;
                                      font-size: 28px;
                                      margin-top: 6px;
                                    }
                                    .home-newsfeed .sport-card {
                                      padding: 22px;
                                      margin-bottom: 20px;
                                      color: #fff;
                                      min-height: 140px;
                                      position: relative;
                                    }
                                    .home-newsfeed .sport-card h5 {
                                      margin-top: 0;
                                      margin-bottom: 10px;
                                      font-size: 20px;
                                    }
                                    .home-newsfeed .sport-card .sport-label {
                                      font-size: 12px;
                                      text-transform: uppercase;
                                      letter-spacing: .8px;
                                      opacity: .9;
                                      margin-bottom: 10px;
                                      display: inline-block;
                                    }
                                    .home-newsfeed .sport-card .cta-odds {
                                      font-size: 22px;
                                      font-weight: 700;
                                      margin-top: 14px;
                                      letter-spacing: .5px;
                                    }
                                    .home-newsfeed .sport-card-football { background: linear-gradient(135deg, #0d2b49 0%, #0f4d79 100%); }
                                    .home-newsfeed .sport-card-tennis { background: linear-gradient(135deg, #0a3f1a 0%, #1f7d54 100%); }
                                    .home-newsfeed .sport-card-hockey { background: linear-gradient(135deg, #1a283f 0%, #2d4b75 100%); }
                                    .home-newsfeed .ad-banner {
                                      background: linear-gradient(135deg, #f95f0c 0%, #ffb200 100%);
                                      color: #0f1b34;
                                      padding: 28px 30px;
                                      display: flex;
                                      align-items: center;
                                      justify-content: space-between;
                                      margin-top: 20px;
                                    }
                                    .home-newsfeed .ad-banner .ad-copy small {
                                      text-transform: uppercase;
                                      letter-spacing: 1px;
                                      font-weight: 700;
                                      opacity: .9;
                                    }
                                    .home-newsfeed .ad-banner h4 {
                                      margin: 10px 0 0;
                                      font-size: 26px;
                                      line-height: 1.2;
                                    }
                                    .home-newsfeed .ad-banner p {
                                      margin: 12px 0 0;
                                      font-size: 14px;
                                      opacity: .85;
                                    }
                                    .home-newsfeed .spotlight-card {
                                      background: #111e33;
                                      padding: 24px;
                                      color: #fff;
                                      margin-bottom: 20px;
                                    }
                                    .home-newsfeed .spotlight-card .spotlight-label {
                                      text-transform: uppercase;
                                      letter-spacing: 1px;
                                      font-size: 12px;
                                      color: #8ab9ff;
                                      margin-bottom: 12px;
                                      display: inline-block;
                                    }
                                    .home-newsfeed .spotlight-card h5 {
                                      margin: 0 0 10px;
                                      font-size: 20px;
                                    }
                                    .home-newsfeed .spotlight-card .odds-list {
                                      display: flex;
                                      gap: 12px;
                                      margin-top: 16px;
                                    }
                                    .home-newsfeed .spotlight-card .odds-chip {
                                      background: rgba(255,255,255,0.08);
                                      padding: 10px 14px;
                                      border-radius: 12px;
                                      font-size: 14px;
                                    }
                                    .home-newsfeed .upcoming-match-row {
                                      margin-top: 24px;
                                    }
                                    .home-newsfeed .upcoming-card {
                                      border-radius: 18px;
                                      padding: 18px 18px 16px;
                                      margin-bottom: 18px;
                                      background: #ffffff;
                                      border: 1px solid rgba(0,0,0,0.08);
                                      color: #111;
                                      min-height: auto;
                                    }
                                    .home-newsfeed .upcoming-card-football,
                                    .home-newsfeed .upcoming-card-hockey,
                                    .home-newsfeed .upcoming-card-basketball,
                                    .home-newsfeed .upcoming-card-tennis {
                                      background: #ffffff;
                                    }
                                    .home-newsfeed .upcoming-sport-label {
                                      text-transform: uppercase;
                                      letter-spacing: 1px;
                                      color: #333;
                                      margin-bottom: 16px;
                                      display: block;
                                      font-size: 12px;
                                      font-weight: 700;
                                    }
                                    .home-newsfeed .upcoming-game {
                                      display: flex;
                                      align-items: center;
                                      justify-content: space-between;
                                      padding: 12px 0;
                                      border-bottom: 1px solid rgba(0,0,0,0.08);
                                      transition: background 0.2s ease;
                                    }
                                    .home-newsfeed .upcoming-game:hover {
                                      background: rgba(26, 63, 114, 0.04);
                                      padding-left: 8px;
                                      padding-right: 8px;
                                      margin-left: -8px;
                                      margin-right: -8px;
                                      border-radius: 4px;
                                      cursor: pointer;
                                    }
                                    .home-newsfeed .upcoming-game:last-child {
                                      border-bottom: none;
                                    }
                                    .home-newsfeed .upcoming-game a {
                                      color: inherit;
                                      display: flex;
                                      width: 100%;
                                      justify-content: space-between;
                                      text-decoration: none;
                                    }
                                    .home-newsfeed .upcoming-game .upcoming-team {
                                      display: block;
                                      font-weight: 700;
                                      margin-bottom: 4px;
                                      font-size: 15px;
                                    }
                                    .home-newsfeed .upcoming-game small {
                                      color: rgba(0,0,0,0.6);
                                      display: block;
                                      margin-bottom: 4px;
                                    }
                                    .home-newsfeed .upcoming-game .match-meta {
                                      color: rgba(0,0,0,0.55);
                                      font-size: 13px;
                                    }
                                    .home-newsfeed .upcoming-game .match-odds {
                                      font-weight: 700;
                                      text-align: right;
                                      min-width: 84px;
                                      color: #111;
                                      background: linear-gradient(135deg, #1a3f72 0%, #0f2a48 100%);
                                      color: #fff;
                                      padding: 8px 12px;
                                      border-radius: 6px;
                                      font-size: 14px;
                                      transition: all 0.2s ease;
                                      cursor: pointer;
                                    }
                                    .home-newsfeed .upcoming-game .match-odds:hover {
                                      box-shadow: 0 4px 12px rgba(26, 63, 114, 0.3);
                                      transform: translateY(-2px);
                                    }
                                    
                                    /* Betslip Styling */
                                    .bet_place {
                                      transition: all 0.3s ease !important;
                                      box-shadow: 0 2px 8px rgba(26, 63, 114, 0.15) !important;
                                    }
                                    .bet_place:hover {
                                      box-shadow: 0 6px 16px rgba(26, 63, 114, 0.25) !important;
                                      transform: translateY(-2px);
                                    }
                                    .slip-item-remove {
                                      transition: all 0.2s ease;
                                    }
                                    .slip-item-remove:hover {
                                      transform: scale(1.2);
                                    }
                                    
                                    /* My Bets Page Styling */
                                    .my-bets-page {
                                      padding: 20px;
                                    }
                                    
                                    .bets-filter-wrap {
                                      margin-bottom: 30px;
                                      padding-bottom: 20px;
                                      border-bottom: 2px solid rgba(26, 63, 114, 0.1);
                                    }
                                    
                                    .bets-filter-buttons {
                                      display: flex;
                                      gap: 12px;
                                      flex-wrap: wrap;
                                    }
                                    
                                    .btn-filter {
                                      display: inline-flex;
                                      align-items: center;
                                      gap: 8px;
                                      padding: 10px 16px;
                                      border: 2px solid rgba(26, 63, 114, 0.2);
                                      background: #ffffff;
                                      color: #333;
                                      border-radius: 8px;
                                      font-weight: 500;
                                      transition: all 0.3s ease;
                                      cursor: pointer;
                                    }
                                    
                                    .btn-filter:hover {
                                      border-color: #1a3f72;
                                      background: rgba(26, 63, 114, 0.05);
                                    }
                                    
                                    .btn-filter.active {
                                      background: linear-gradient(135deg, #1a3f72 0%, #0f2a48 100%);
                                      color: #fff;
                                      border-color: #1a3f72;
                                    }
                                    
                                    .btn-filter .badge {
                                      font-size: 11px;
                                      padding: 3px 7px;
                                      margin-left: 4px;
                                      border-radius: 12px;
                                    }
                                    
                                    .badge-success {
                                      background: #27ae60 !important;
                                      color: #fff !important;
                                    }
                                    
                                    .badge-danger {
                                      background: #e74c3c !important;
                                      color: #fff !important;
                                    }
                                    
                                    .bets-empty-state {
                                      text-align: center;
                                      padding: 60px 20px;
                                      color: #999;
                                    }
                                    
                                    .bets-empty-state i {
                                      font-size: 64px;
                                      color: #ddd;
                                      margin-bottom: 20px;
                                      display: block;
                                    }
                                    
                                    .bets-empty-state h3 {
                                      color: #666;
                                      margin: 10px 0;
                                    }
                                    
                                    .bets-empty-state p {
                                      color: #999;
                                      font-size: 14px;
                                    }
                                    
                                    .bets-container {
                                      display: grid;
                                      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
                                      gap: 20px;
                                    }
                                    
                                    .bet-card {
                                      background: #ffffff;
                                      border: 1px solid rgba(26, 63, 114, 0.15);
                                      border-radius: 12px;
                                      padding: 18px;
                                      transition: all 0.3s ease;
                                      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
                                    }
                                    
                                    .bet-card:hover {
                                      box-shadow: 0 8px 24px rgba(26, 63, 114, 0.15);
                                      transform: translateY(-4px);
                                    }
                                    
                                    .bet-card.hidden {
                                      display: none;
                                    }
                                    
                                    .bet-card-header {
                                      display: flex;
                                      justify-content: space-between;
                                      align-items: flex-start;
                                      margin-bottom: 14px;
                                      padding-bottom: 12px;
                                      border-bottom: 1px solid rgba(0, 0, 0, 0.06);
                                    }
                                    
                                    .bet-status {
                                      display: inline-flex;
                                      align-items: center;
                                      gap: 6px;
                                      padding: 6px 12px;
                                      border-radius: 20px;
                                      font-size: 12px;
                                      font-weight: 600;
                                      text-transform: uppercase;
                                      letter-spacing: 0.5px;
                                    }
                                    
                                    .bet-status.pending {
                                      background: rgba(241, 196, 15, 0.2);
                                      color: #f39c12;
                                    }
                                    
                                    .bet-status.won {
                                      background: rgba(39, 174, 96, 0.2);
                                      color: #27ae60;
                                    }
                                    
                                    .bet-status.lost {
                                      background: rgba(231, 76, 60, 0.2);
                                      color: #e74c3c;
                                    }
                                    
                                    .bet-date {
                                      font-size: 12px;
                                      color: #999;
                                      margin-bottom: 8px;
                                    }
                                    
                                    .bet-match-name {
                                      font-size: 16px;
                                      font-weight: 600;
                                      color: #1a3f72;
                                      margin-bottom: 12px;
                                      line-height: 1.4;
                                    }
                                    
                                    .bet-type-badge {
                                      display: inline-block;
                                      padding: 4px 10px;
                                      background: rgba(26, 63, 114, 0.1);
                                      color: #1a3f72;
                                      border-radius: 6px;
                                      font-size: 12px;
                                      font-weight: 500;
                                      margin-bottom: 12px;
                                    }
                                    
                                    .bet-details {
                                      display: grid;
                                      grid-template-columns: 1fr 1fr;
                                      gap: 12px;
                                      margin: 14px 0;
                                    }
                                    
                                    .bet-detail-item {
                                      display: flex;
                                      flex-direction: column;
                                    }
                                    
                                    .bet-detail-label {
                                      font-size: 11px;
                                      color: #999;
                                      text-transform: uppercase;
                                      letter-spacing: 0.5px;
                                      font-weight: 600;
                                      margin-bottom: 4px;
                                    }
                                    
                                    .bet-detail-value {
                                      font-size: 18px;
                                      font-weight: 700;
                                      color: #1a3f72;
                                    }
                                    
                                    .bet-detail-value.won {
                                      color: #27ae60;
                                    }
                                    
                                    .bet-detail-value.lost {
                                      color: #e74c3c;
                                    }
                                    
                                    .bet-footer {
                                      display: flex;
                                      justify-content: space-between;
                                      align-items: center;
                                      margin-top: 14px;
                                      padding-top: 12px;
                                      border-top: 1px solid rgba(0, 0, 0, 0.06);
                                    }
                                    
                                    .bet-payout {
                                      text-align: right;
                                    }
                                    
                                    .bet-payout-label {
                                      font-size: 11px;
                                      color: #999;
                                      text-transform: uppercase;
                                      letter-spacing: 0.5px;
                                    }
                                    
                                    .bet-payout-amount {
                                      font-size: 20px;
                                      font-weight: 700;
                                      color: #1a3f72;
                                    }
                                    
                                    .bet-payout-amount.won {
                                      color: #27ae60;
                                    }
                                    
                                    .bet-cancel-btn {
                                      background: rgba(231, 76, 60, 0.1);
                                      color: #e74c3c;
                                      border: 1px solid rgba(231, 76, 60, 0.2);
                                      padding: 8px 12px;
                                      border-radius: 6px;
                                      font-size: 12px;
                                      cursor: pointer;
                                      transition: all 0.2s ease;
                                    }
                                    
                                    .bet-cancel-btn:hover {
                                      background: rgba(231, 76, 60, 0.2);
                                      border-color: rgba(231, 76, 60, 0.4);
                                    }
                                  </style>

                                  <div class="home-newsfeed">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="featured-match-card" style="background-image: linear-gradient(rgba(3,28,54,.88), rgba(3,28,54,.72)), url('{{ asset('assets/front_end/images/bet.jpg') }}'); background-size: cover; background-position: center;">
                                          <div class="match-tag">Featured Football Match</div>
                                          <h3>Flamengo de Sucre <small>vs</small> Atlético Sucre</h3>
                                          <div class="match-details">Primera A Chuquisaca • Bolivia • 17:00</div>
                                          <p class="featured-meta">A decisive regional fixture with live odds steam and market momentum from Bolivian Primera A.</p>
                                          <div class="row odds-grid">
                                            <div class="col-xs-4 odds-cell">
                                              <h4>Flamengo de Sucre</h4>
                                              <strong>2.10</strong>
                                            </div>
                                            <div class="col-xs-4 odds-cell">
                                              <h4>Draw</h4>
                                              <strong>3.30</strong>
                                            </div>
                                            <div class="col-xs-4 odds-cell">
                                              <h4>Atlético Sucre</h4>
                                              <strong>2.45</strong>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-sm-8">
                                              <div class="featured-meta">Key stat: Flamengo has scored in 8 of the last 9 home matches, making the live over/under market attractive.</div>
                                            </div>
                                            <div class="col-sm-4 text-right hidden-xs">
                                              <a href="https://www.sofascore.com/football/match/flamengo-de-sucre-atletico-sucre/JwMdswRIi#id:16223663" target="_blank" class="btn btn-primary btn-lg">View odds</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="upcoming-match-row">
                                      <div class="upcoming-card upcoming-card-football">
                                        <div class="upcoming-sport-label">Football</div>
                                        <div class="upcoming-game">
                                          <a href="{{ url('football') }}">
                                            <div>
                                              <span class="upcoming-team">Nacional Potosí</span>
                                              <small>vs Real Santa Cruz</small>
                                              <div class="match-meta">20:00 • Bolivia</div>
                                            </div>
                                            <div class="match-odds">1.95</div>
                                          </a>
                                        </div>
                                        <div class="upcoming-game">
                                          <a href="{{ url('football') }}">
                                            <div>
                                              <span class="upcoming-team">Always Ready</span>
                                              <small>vs Blooming</small>
                                              <div class="match-meta">21:30 • Bolivia</div>
                                            </div>
                                            <div class="match-odds">2.10</div>
                                          </a>
                                        </div>
                                      </div>
                                      <div class="upcoming-card upcoming-card-hockey">
                                        <div class="upcoming-sport-label">Hockey</div>
                                        <div class="upcoming-game">
                                          <a href="{{ url('hockey') }}">
                                            <div>
                                              <span class="upcoming-team">Dallas Stars</span>
                                              <small>vs Tampa Bay</small>
                                              <div class="match-meta">02:00 • NHL</div>
                                            </div>
                                            <div class="match-odds">2.40</div>
                                          </a>
                                        </div>
                                        <div class="upcoming-game">
                                          <a href="{{ url('hockey') }}">
                                            <div>
                                              <span class="upcoming-team">Vegas Golden Knights</span>
                                              <small>vs Seattle Kraken</small>
                                              <div class="match-meta">04:30 • NHL</div>
                                            </div>
                                            <div class="match-odds">2.15</div>
                                          </a>
                                        </div>
                                      </div>
                                      <div class="upcoming-card upcoming-card-basketball">
                                        <div class="upcoming-sport-label">Basketball</div>
                                        <div class="upcoming-game">
                                          <a href="{{ url('basketball') }}">
                                            <div>
                                              <span class="upcoming-team">Miami Heat</span>
                                              <small>vs Philadelphia</small>
                                              <div class="match-meta">19:00 • NBA</div>
                                            </div>
                                            <div class="match-odds">1.88</div>
                                          </a>
                                        </div>
                                        <div class="upcoming-game">
                                          <a href="{{ url('basketball') }}">
                                            <div>
                                              <span class="upcoming-team">Phoenix Suns</span>
                                              <small>vs Milwaukee</small>
                                              <div class="match-meta">21:30 • NBA</div>
                                            </div>
                                            <div class="match-odds">2.05</div>
                                          </a>
                                        </div>
                                      </div>
                                      <div class="upcoming-card upcoming-card-tennis">
                                        <div class="upcoming-sport-label">Tennis</div>
                                        <div class="upcoming-game">
                                          <a href="{{ url('tennis') }}">
                                            <div>
                                              <span class="upcoming-team">Alcaraz</span>
                                              <small>vs Sinner</small>
                                              <div class="match-meta">17:45 • ATP</div>
                                            </div>
                                            <div class="match-odds">1.72</div>
                                          </a>
                                        </div>
                                        <div class="upcoming-game">
                                          <a href="{{ url('tennis') }}">
                                            <div>
                                              <span class="upcoming-team">Badosa</span>
                                              <small>vs Pegula</small>
                                              <div class="match-meta">19:10 • WTA</div>
                                            </div>
                                            <div class="match-odds">1.98</div>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="bets">
                                  <div class="my-bets-page">
                                    <!-- Filter/Status Tabs -->
                                    <div class="bets-filter-wrap">
                                      <div class="bets-filter-buttons">
                                        <button class="btn btn-filter active" data-filter="all">
                                          <i class="fa fa-list"></i> All Bets
                                        </button>
                                        <button class="btn btn-filter" data-filter="pending">
                                          <i class="fa fa-clock-o"></i> Pending <span class="badge" id="pending-count">0</span>
                                        </button>
                                        <button class="btn btn-filter" data-filter="won">
                                          <i class="fa fa-check-circle"></i> Won <span class="badge badge-success" id="won-count">0</span>
                                        </button>
                                        <button class="btn btn-filter" data-filter="lost">
                                          <i class="fa fa-times-circle"></i> Lost <span class="badge badge-danger" id="lost-count">0</span>
                                        </button>
                                      </div>
                                    </div>

                                    <!-- Empty State -->
                                    <div class="bets-empty-state" id="bets-empty">
                                      <i class="fa fa-inbox"></i>
                                      <h3>No Bets Placed Yet</h3>
                                      <p>Start your betting journey by selecting games from the News Feed above and placing your bets.</p>
                                    </div>

                                    <!-- Bets Container -->
                                    <div class="bets-container" id="bets-container" style="display: none;">
                                      <!-- Bets will be rendered here -->
                                    </div>
                                  </div>
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
  
  // ============ BETSLIP MANAGEMENT ============
  var betslip = {
    items: [],
    
    addBet: function(matchName, selection, odds) {
      var id = Date.now();
      this.items.push({
        id: id,
        matchName: matchName,
        selection: selection,
        odds: parseFloat(odds)
      });
      this.render();
      this.updateStats();
    },
    
    removeBet: function(id) {
      this.items = this.items.filter(function(item) {
        return item.id !== id;
      });
      this.render();
      this.updateStats();
    },
    
    clear: function() {
      this.items = [];
      this.render();
      this.updateStats();
    },
    
    calculateTotalOdds: function() {
      if (this.items.length === 0) return 0;
      var total = 1;
      for (var i = 0; i < this.items.length; i++) {
        total *= this.items[i].odds;
      }
      return total;
    },
    
    updateStats: function() {
      var count = this.items.length;
      var totalOdds = this.calculateTotalOdds();
      var stake = parseFloat($('#stake-amount').val()) || 0;
      var potentialWin = (stake * totalOdds).toFixed(2);
      
      $('#selection-count').text(count);
      $('#total-odds').text(totalOdds.toFixed(2) + '×');
      $('#potential-win').text('$' + potentialWin);
      
      // Update bet type
      if (count === 1) {
        $('#bet-type-display').html('<i class="fa fa-check-circle" style="color: #1a3f72; margin-right: 5px;"></i>Single');
      } else if (count === 2) {
        $('#bet-type-display').html('<i class="fa fa-link" style="color: #f09c38; margin-right: 5px;"></i>Double');
      } else if (count > 2) {
        $('#bet-type-display').html('<i class="fa fa-star" style="color: #e74c3c; margin-right: 5px;"></i>Multiple (' + count + ')');
      }
    },
    
    render: function() {
      var container = $('#betslip-container');
      
      if (this.items.length === 0) {
        container.html('<div style="padding: 30px 20px; text-align: center; color: #999;"><i class="fa fa-inbox" style="font-size: 32px; margin-bottom: 10px; display: block;"></i><p style="margin: 0; font-size: 13px;">No selections yet<br/>Click odds to add bets</p></div>');
        return;
      }
      
      var html = '';
      var self = this;
      
      this.items.forEach(function(item, index) {
        var sportIcon = '';
        if (item.matchName.toLowerCase().includes('football') || item.matchName.toLowerCase().includes('juventus') || item.matchName.toLowerCase().includes('flamengo')) {
          sportIcon = 'fa-futbol-o';
        } else if (item.matchName.toLowerCase().includes('hockey') || item.matchName.toLowerCase().includes('stars') || item.matchName.toLowerCase().includes('kraken')) {
          sportIcon = 'fa-hockey-puck';
        } else if (item.matchName.toLowerCase().includes('basketball') || item.matchName.toLowerCase().includes('heat') || item.matchName.toLowerCase().includes('suns')) {
          sportIcon = 'fa-basketball';
        } else if (item.matchName.toLowerCase().includes('tennis') || item.matchName.toLowerCase().includes('alcaraz') || item.matchName.toLowerCase().includes('badosa')) {
          sportIcon = 'fa-terminal';
        }
        
        html += '<div style="padding: 12px; border-bottom: 1px solid #e0e0e0; background: #fff; transition: all 0.2s;">';
        html += '<div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">';
        html += '<div style="flex: 1;">';
        html += '<div style="font-size: 12px; color: #666; margin-bottom: 4px;"><i class="fa ' + sportIcon + '" style="margin-right: 6px; color: #1a3f72;"></i>Match ' + (index + 1) + '</div>';
        html += '<div style="font-size: 13px; font-weight: 600; color: #333;">' + item.matchName + '</div>';
        html += '<div style="font-size: 11px; color: #999; margin-top: 4px;">' + item.selection + ' <strong style="color: #1a3f72;">@ ' + item.odds.toFixed(2) + '</strong></div>';
        html += '</div>';
        html += '<span class="slip-item-remove" data-bet-id="' + item.id + '" style="cursor: pointer; color: #d9534f; font-weight: 700; font-size: 18px; line-height: 1; width: 20px; text-align: right;">×</span>';
        html += '</div>';
        html += '</div>';
      });
      
      container.html(html);
    }
  };
  
  // ============ ODDS BUTTON CLICK HANDLER ============
  $(document).on('click', '.upcoming-game a', function(e) {
    e.preventDefault();
    // Create clickable odds from the match odds displayed
    var $game = $(this).closest('.upcoming-game');
    var teamName = $game.find('.upcoming-team').text();
    var vs = $game.find('small').text();
    var matchName = teamName + ' vs ' + vs;
    var odds = $game.find('.match-odds').text();
    var selection = teamName;
    
    betslip.addBet(matchName, selection, odds);
    
    // Visual feedback
    $(this).closest('.upcoming-game').fadeOut(100).fadeIn(100);
  });
  
  // ============ STAKE AMOUNT CALCULATOR ============
  $(document).on('input', '#stake-amount', function() {
    betslip.updateStats();
  });
  
  // ============ CLEAR BETSLIP ============
  $(document).on('click', '.clear', function() {
    betslip.clear();
  });
  
  // ============ REMOVE INDIVIDUAL BET ============
  $(document).on('click', '.slip-item-remove', function() {
    var id = $(this).data('bet-id');
    betslip.removeBet(id);
  });
  
  // ============ MY BETS MANAGEMENT ============
  var myBets = {
    bets: [],
    currentFilter: 'all',
    
    loadBets: function() {
      var stored = localStorage.getItem('myBets');
      this.bets = stored ? JSON.parse(stored) : [];
    },
    
    saveBets: function() {
      localStorage.setItem('myBets', JSON.stringify(this.bets));
    },
    
    addBet: function(betData) {
      var bet = {
        id: Date.now(),
        items: betData.items,
        stake: betData.stake,
        totalOdds: betData.totalOdds,
        potentialWin: betData.potentialWin,
        status: 'pending',
        dateTime: new Date().toLocaleString(),
        timestamp: Date.now()
      };
      this.bets.unshift(bet); // Add to beginning
      this.saveBets();
      return bet;
    },
    
    updateBetStatus: function(betId, status) {
      var bet = this.bets.find(function(b) { return b.id === betId; });
      if (bet) {
        bet.status = status;
        this.saveBets();
      }
    },
    
    removeBet: function(betId) {
      this.bets = this.bets.filter(function(b) { return b.id !== betId; });
      this.saveBets();
    },
    
    getBetsByStatus: function(status) {
      if (status === 'all') return this.bets;
      return this.bets.filter(function(b) { return b.status === status; });
    },
    
    render: function(filter) {
      var bets = this.getBetsByStatus(filter);
      var container = $('#bets-container');
      var emptyState = $('#bets-empty');
      
      if (bets.length === 0) {
        container.hide();
        emptyState.show();
        return;
      }
      
      container.show();
      emptyState.hide();
      
      var html = '';
      var self = this;
      
      bets.forEach(function(bet) {
        var betType = '';
        var betTypeIcon = '';
        if (bet.items.length === 1) {
          betType = 'Single';
          betTypeIcon = 'fa-check-circle';
        } else if (bet.items.length === 2) {
          betType = 'Double';
          betTypeIcon = 'fa-link';
        } else {
          betType = 'Multiple';
          betTypeIcon = 'fa-star';
        }
        
        var statusClass = bet.status;
        var statusIcon = '';
        if (bet.status === 'pending') {
          statusIcon = 'fa-clock-o';
        } else if (bet.status === 'won') {
          statusIcon = 'fa-check-circle';
        } else {
          statusIcon = 'fa-times-circle';
        }
        
        var payout = bet.status === 'won' ? bet.potentialWin : '—';
        var payoutClass = bet.status === 'won' ? 'won' : '';
        
        html += '<div class="bet-card" data-status="' + bet.status + '" data-bet-id="' + bet.id + '">';
        html += '<div class="bet-card-header">';
        html += '<div>';
        html += '<div class="bet-date">' + bet.dateTime + '</div>';
        html += '<div class="bet-match-name">';
        bet.items.forEach(function(item, idx) {
          html += item.matchName;
          if (idx < bet.items.length - 1) html += ' + ';
        });
        html += '</div>';
        html += '</div>';
        html += '<span class="bet-status ' + statusClass + '"><i class="fa ' + statusIcon + '"></i> ' + statusClass.toUpperCase() + '</span>';
        html += '</div>';
        
        html += '<div class="bet-type-badge"><i class="fa ' + betTypeIcon + '" style="margin-right: 6px;"></i>' + betType + ' Bet</div>';
        
        html += '<div class="bet-details">';
        html += '<div class="bet-detail-item">';
        html += '<div class="bet-detail-label">Odds</div>';
        html += '<div class="bet-detail-value">' + bet.totalOdds.toFixed(2) + '×</div>';
        html += '</div>';
        html += '<div class="bet-detail-item">';
        html += '<div class="bet-detail-label">Stake</div>';
        html += '<div class="bet-detail-value">$' + bet.stake.toFixed(2) + '</div>';
        html += '</div>';
        html += '</div>';
        
        html += '<div class="bet-footer">';
        if (bet.status === 'pending') {
          html += '<button class="bet-cancel-btn" data-bet-id="' + bet.id + '"><i class="fa fa-times"></i> Cancel</button>';
        } else {
          html += '<div></div>';
        }
        html += '<div class="bet-payout">';
        html += '<div class="bet-payout-label">Payout</div>';
        html += '<div class="bet-payout-amount ' + payoutClass + '">$' + payout + '</div>';
        html += '</div>';
        html += '</div>';
        
        html += '</div>';
      });
      
      container.html(html);
    },
    
    updateStats: function() {
      var pending = this.getBetsByStatus('pending').length;
      var won = this.getBetsByStatus('won').length;
      var lost = this.getBetsByStatus('lost').length;
      
      $('#pending-count').text(pending);
      $('#won-count').text(won);
      $('#lost-count').text(lost);
    }
  };
  
  // ============ PLACE BET ============
  $(document).on('click', '.bet_place', function(e) {
    e.preventDefault();
    
    if (betslip.items.length === 0) {
      alert('Please select at least one bet');
      return;
    }
    
    var stake = parseFloat($('#stake-amount').val());
    if (!stake || stake <= 0) {
      alert('Please enter a valid stake amount');
      return;
    }
    
    var totalOdds = betslip.calculateTotalOdds();
    var potentialWin = (stake * totalOdds).toFixed(2);
    
    // Add bet to my bets
    myBets.addBet({
      items: betslip.items.slice(),
      stake: stake,
      totalOdds: totalOdds,
      potentialWin: potentialWin
    });
    
    myBets.updateStats();
    myBets.render(myBets.currentFilter);
    
    // Show success message
    $('.betPlace_show').fadeIn();
    
    // Reset after 3 seconds
    setTimeout(function() {
      betslip.clear();
      $('#stake-amount').val('');
      betslip.updateStats();
      $('.betPlace_show').fadeOut();
    }, 3000);
  });
  
  // ============ FILTER BETS ============
  $(document).on('click', '.btn-filter', function() {
    $('.btn-filter').removeClass('active');
    $(this).addClass('active');
    
    var filter = $(this).data('filter');
    myBets.currentFilter = filter;
    myBets.render(filter);
  });
  
  // ============ CANCEL BET ============
  $(document).on('click', '.bet-cancel-btn', function() {
    var betId = $(this).data('bet-id');
    if (confirm('Cancel this bet?')) {
      myBets.removeBet(betId);
      myBets.updateStats();
      myBets.render(myBets.currentFilter);
    }
  });
  
  // ============ GOT IT BUTTON ============
  $(document).on('click', '.Got_section', function(e) {
    e.preventDefault();
    $('.betPlace_show').fadeOut();
    betslip.clear();
    $('#stake-amount').val('');
    betslip.updateStats();
  });
  
  // Initialize on page load
  $(document).ready(function() {
    // Initialize betslip
    betslip.updateStats();
    
    // Initialize my bets
    myBets.loadBets();
    myBets.updateStats();
    myBets.render('all');
  });
</script>