@include('common/header_link')
    <!-- Sidebar -->
    @include('common/leftbar')
    <!-- Page Content -->
      <div class="bog_content">
          @include('common/register_header')
          <div class="container deposit-page">
              <div class="row page-hero">
                  <div class="col-md-10 col-md-offset-1">
                      <div class="page-hero-card text-center">
                          <h1>Deposit Funds Securely</h1>
                          <p>Choose from multiple trusted payment methods including cryptocurrency, PayPal, Skrill, Neteller, Eversend, and major card networks.</p>
                          <a href="#payment-methods" class="btn btn-primary btn-lg">Explore Payment Options</a>
                      </div>
                  </div>
              </div>

              <div class="row payment-overview">
                  <div class="col-md-6">
                      <div class="note-card">
                          <h3>Trusted global payments</h3>
                          <p>Our deposit flow is designed for speed, compliance, and clarity. Every transaction is secured and supported by industry-leading partners.</p>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="note-card">
                          <h3>Flexible funding</h3>
                          <p>Whether you prefer cards, digital wallets, crypto, or cross-border transfers, we provide premium options that suit your needs.</p>
                      </div>
                  </div>
              </div>

              <div class="row payment-grid" id="payment-methods">
                  <div class="col-md-4">
                      <div class="payment-card">
                          <div class="payment-card-icon"><i class="fa fa-credit-card"></i></div>
                          <div class="payment-card-title">Credit & Debit Cards</div>
                          <div class="payment-card-text">Accept Visa, Mastercard, and major debit cards instantly. Fast verification and broad acceptance for every transaction.</div>
                          <a href="#" class="btn btn-default btn-card-action">Start with Cards</a>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="payment-card">
                          <div class="payment-card-icon"><i class="fa fa-cc-visa"></i></div>
                          <div class="payment-card-title">Visa</div>
                          <div class="payment-card-text">Trusted, secure, and globally accepted. Visa deposits are processed instantly with strong anti-fraud protections.</div>
                          <a href="#" class="btn btn-default btn-card-action">Use Visa</a>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="payment-card">
                          <div class="payment-card-icon"><i class="fa fa-cc-paypal"></i></div>
                          <div class="payment-card-title">PayPal</div>
                          <div class="payment-card-text">One-click deposits through PayPal for convenient account funding without sharing card details.</div>
                          <a href="#" class="btn btn-default btn-card-action">Deposit with PayPal</a>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="payment-card">
                          <div class="payment-card-icon"><i class="fa fa-dollar"></i></div>
                          <div class="payment-card-title">Skrill</div>
                          <div class="payment-card-text">Fast digital wallet transfers with low fees and rapid confirmation for premium users.</div>
                          <a href="#" class="btn btn-default btn-card-action">Pay with Skrill</a>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="payment-card">
                          <div class="payment-card-icon"><i class="fa fa-university"></i></div>
                          <div class="payment-card-title">Neteller</div>
                          <div class="payment-card-text">Secure wallet deposits trusted by businesses worldwide. Great for high-volume deposits and fast liquidity.</div>
                          <a href="#" class="btn btn-default btn-card-action">Use Neteller</a>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="payment-card">
                          <div class="payment-card-icon"><i class="fa fa-btc"></i></div>
                          <div class="payment-card-title">Cryptocurrency</div>
                          <div class="payment-card-text">Deposit with Bitcoin, Ethereum, and supported digital currencies for secure, modern funding.</div>
                          <a href="#" class="btn btn-default btn-card-action">Deposit Crypto</a>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="payment-card">
                          <div class="payment-card-icon"><i class="fa fa-exchange"></i></div>
                          <div class="payment-card-title">Eversend</div>
                          <div class="payment-card-text">Cross-border transfers with competitive rates and easy account top-up through Eversend.</div>
                          <a href="#" class="btn btn-default btn-card-action">Use Eversend</a>
                      </div>
                  </div>
              </div>

              <div class="row deposit-notes">
                  <div class="col-md-8 col-md-offset-2">
                      <div class="note-card">
                          <h3>Why deposit with Betogram?</h3>
                          <p class="method-summary"><span><i class="fa fa-shield"></i> Secure payments with encryption and verification.</span><span><i class="fa fa-clock-o"></i> Fast processing across every method.</span><span><i class="fa fa-headphones"></i> 24/7 support for payment help.</span></p>
                          <p>Our payment page was designed to deliver a premium deposit experience and keep your funds moving quickly. Select your preferred provider and follow the quick verification steps to complete your top-up.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
@include('common/footer_link')