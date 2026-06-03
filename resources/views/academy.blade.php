@include('common/header_link')
@include('common/leftbar')
<div class="bog_content">
    @include('common/register_header')
    <div class="container academy-page">
        <div class="row page-hero">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="academy-title">Betogram Academy</h1>
                <p class="academy-lead">Master strategy, odds reading, bankroll management and advanced bet techniques with our structured courses and expert tutorials.</p>
                <p><a href="#courses" class="btn btn-primary btn-lg">Browse Courses</a> <a href="#tutorials" class="btn btn-default btn-lg">Latest Tutorials</a></p>
            </div>
        </div>

        <div class="row" id="courses">
            <div class="col-md-12">
                <h2 class="section-title">Featured Courses</h2>
                <div class="row course-grid">
                    <div class="col-md-4">
                        <div class="course-card">
                            <div class="course-thumb"><img src="{{ asset('assets/front_end/images/course_strategy.svg') }}" alt="Strategy" class="img-responsive"></div>
                            <div class="course-body">
                                <h4>Winning Strategy 101</h4>
                                <p>Learn proven staking plans, market selection and in-play strategies used by top bettors.</p>
                                <div class="course-meta">Duration: 4 weeks • Level: Beginner → Advanced</div>
                                <a href="#" class="btn btn-outline">Start Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="course-card">
                            <div class="course-thumb"><img src="{{ asset('assets/front_end/images/course_odds.svg') }}" alt="Odds" class="img-responsive" onerror="this.onerror=null;this.src='{{ asset('assets/front_end/images/course_strategy.svg') }}';"></div>
                            <div class="course-body">
                                <h4>Odds & Value</h4>
                                <p>Understand probability, implied odds, value spotting and how to build a consistent edge.</p>
                                <div class="course-meta">Duration: 6 weeks • Level: Intermediate</div>
                                <a href="#" class="btn btn-outline">Start Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="course-card">
                            <div class="course-thumb"><img src="{{ asset('assets/front_end/images/course_bankroll.svg') }}" alt="Bankroll" class="img-responsive"></div>
                            <div class="course-body">
                                <h4>Bankroll Management</h4>
                                <p>Practical systems for protecting and growing your staking bank across winning and losing runs.</p>
                                <div class="course-meta">Duration: 3 weeks • Level: Beginner</div>
                                <a href="#" class="btn btn-outline">Start Course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="tutorials">
            <div class="col-md-12">
                <h2 class="section-title">Latest Tutorials</h2>
                <div class="row tutorial-list">
                    <div class="col-md-6">
                        <div class="tutorial-card">
                            <h4>How to Read Match Statistics</h4>
                            <p>Step-by-step guide to extracting actionable signals from team and player stats.</p>
                            <a href="#" class="small muted">Read more</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tutorial-card">
                            <h4>Live Betting: Timing and Execution</h4>
                            <p>Techniques for identifying live market opportunities and executing fast, low-risk trades.</p>
                            <a href="#" class="small muted">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row video-section">
            <div class="col-md-8">
                <h2 class="section-title">Featured Video</h2>
                <div class="video-card">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="academy-video-iframe" class="embed-responsive-item" src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                    </div>
                    <div class="video-url-form" style="margin-top:12px;">
                        <label for="academy-video-url">Video URL (YouTube)</label>
                        <div class="input-group">
                            <input id="academy-video-url" type="url" class="form-control" value="https://www.youtube.com/watch?v=dQw4w9WgXcQ" placeholder="https://www.youtube.com/watch?v=VIDEO_ID">
                            <span class="input-group-btn">
                                <button id="academy-video-update" class="btn btn-primary" type="button">Update Video</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="section-title">Quick Tips</h2>
                <ul class="tips-list">
                    <li><strong>Tip 1:</strong> Track your bets and analyse ROI by market.</li>
                    <li><strong>Tip 2:</strong> Avoid emotional staking; use clear rules.</li>
                    <li><strong>Tip 3:</strong> Focus on sports or leagues you know well.</li>
                </ul>
            </div>
        </div>

        <div class="row faq-section">
            <div class="col-md-12">
                <h2 class="section-title">Academy FAQ</h2>
                <div class="panel-group" id="academy-faq" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="faq1">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#academy-faq" href="#collapseFaq1" aria-expanded="true" aria-controls="collapseFaq1">How long do courses take?</a>
                            </h4>
                        </div>
                        <div id="collapseFaq1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="faq1">
                            <div class="panel-body">Each course displays an estimated duration; most range from 2-6 weeks with flexible pacing.</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="faq2">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#academy-faq" href="#collapseFaq2" aria-expanded="false" aria-controls="collapseFaq2">Are tutorials free?</a>
                            </h4>
                        </div>
                        <div id="collapseFaq2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq2">
                            <div class="panel-body">Many tutorials are free; premium courses may require subscription. Check the course page for details.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@include('common/footer_link')
<script>
    // Allow updating the featured video by pasting a YouTube URL
    (function(){
        function extractYouTubeId(url){
            if(!url) return null;
            var m = url.match(/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([A-Za-z0-9_-]{11})/);
            return m ? m[1] : null;
        }
        document.getElementById('academy-video-update').addEventListener('click', function(){
            var url = document.getElementById('academy-video-url').value.trim();
            var id = extractYouTubeId(url);
            if(id){
                var iframe = document.getElementById('academy-video-iframe');
                iframe.src = 'https://www.youtube.com/embed/' + id + '?rel=0&modestbranding=1';
            } else {
                alert('Please enter a valid YouTube URL.');
            }
        });
    })();
</script>
