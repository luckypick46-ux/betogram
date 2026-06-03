@include('common/header_link')
    @include('common/leftbar')
    <div class="bog_content">
        @include('common/register_header')
        <div class="container shop-page">
            <div class="row page-hero">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1 class="shop-title">Betogram Shop</h1>
                    <p class="shop-lead">Official merchandise and premium content to help you level up your game.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div id="product-grid" class="row"></div>
                </div>
                <div class="col-md-3">
                    <div id="cart-summary" class="note-card" style="position:sticky;top:90px;">
                        <h3>Your Cart <span id="cart-count" class="badge">0</span></h3>
                        <div id="cart-items">
                            <p class="text-muted">No items in cart</p>
                        </div>
                        <hr>
                        <p><strong>Total: </strong><span id="cart-total">$0.00</span></p>
                        <div class="payment-methods">
                            <button id="stripe-btn" class="btn btn-primary btn-block" style="margin-bottom:8px;">Pay with Stripe</button>
                            <button id="paypal-btn" class="btn btn-info btn-block">Pay with PayPal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('common/footer_link')

<style>
.shop-title{font-size:34px;font-weight:700;color:#172b4d}
.shop-lead{color:#556e86;margin-bottom:24px}
.product-card{background:#fff;border:1px solid #e8eef4;border-radius:10px;padding:16px;margin-bottom:18px}
.product-thumb img{width:100%;height:150px;object-fit:cover;border-radius:6px}
.product-body{padding-top:10px}
.product-title{font-weight:700;color:#172b4d}
.product-price{color:#1d8d70;font-weight:700}
.add-cart{margin-top:10px}
.payment-methods{margin-top:12px}
.badge{background:#d9534f;color:#fff;padding:3px 8px;border-radius:3px;font-size:11px;margin-left:6px}
</style>

<script>
$(function(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    function renderProducts(products){
        var $grid = $('#product-grid');
        $grid.empty();
        products.forEach(function(p){
            var col = $('<div class="col-sm-6 col-md-4"></div>');
            var card = $('<div class="product-card"></div>');
            var thumb = $('<div class="product-thumb"><img src="'+p.image+'" onerror="this.onerror=null;this.src=\'{{ asset('assets/front_end/images/p1.png') }}\'" alt="'+p.title+'"></div>');
            var body = $('<div class="product-body"></div>');
            body.append('<div class="product-title">'+p.title+'</div>');
            body.append('<div class="product-desc text-muted" style="font-size:13px">'+(p.description || p.desc)+'</div>');
            body.append('<div class="product-price">$'+p.price.toFixed(2)+'</div>');
            var btn = $('<button class="btn btn-outline add-cart" data-id="'+p.id+'">Add to cart</button>');
            body.append(btn);
            card.append(thumb).append(body);
            col.append(card);
            $grid.append(col);
        });
    }

    function fetchProducts(){
        $.getJSON('{{ url('api/products') }}', function(data){
            renderProducts(data);
        });
    }

    function cartRender(){
        $.ajax({
            url: '{{ url('api/cart') }}',
            type: 'GET',
            success: function(data){
                var $items = $('#cart-items');
                $items.empty();
                $('#cart-count').text(data.count);
                
                if(data.count === 0){
                    $items.append('<p class="text-muted">No items in cart</p>');
                    $('#stripe-btn, #paypal-btn').prop('disabled', true);
                } else {
                    $('#stripe-btn, #paypal-btn').prop('disabled', false);
                    data.items.forEach(function(item){
                        var row = $('<div class="cart-item" style="margin-bottom:12px;padding-bottom:8px;border-bottom:1px solid #e8eef4"></div>');
                        row.append('<div style="display:flex;justify-content:space-between;margin-bottom:4px"><strong>'+item.title+'</strong><span data-cart-id="'+item.id+'" class="remove-item" style="cursor:pointer;color:#d9534f">×</span></div>');
                        row.append('<div class="text-muted" style="font-size:13px">Qty: <input type="number" min="1" class="qty-input" data-cart-id="'+item.id+'" value="'+item.quantity+'" style="width:50px"> × $'+item.price.toFixed(2)+'</div>');
                        row.append('<div class="text-muted" style="font-size:13px">Subtotal: $'+item.subtotal.toFixed(2)+'</div>');
                        $items.append(row);
                    });
                }
                $('#cart-total').text('$'+data.total.toFixed(2));
            }
        });
    }

    // Add to cart
    $('body').on('click','.add-cart',function(e){
        var id = $(this).data('id');
        $.ajax({
            url: '{{ url('api/cart/add') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            data: {product_id: id, quantity: 1},
            success: function(data){
                swal('Added','Item added to cart','success');
                cartRender();
            },
            error: function(){
                swal('Error','Please login first','error');
            }
        });
    });

    // Remove from cart
    $('body').on('click','.remove-item',function(e){
        var cartId = $(this).data('cart-id');
        $.ajax({
            url: '{{ url('api/cart/remove') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            data: {cart_item_id: cartId},
            success: function(){
                cartRender();
            }
        });
    });

    // Update quantity
    $('body').on('change','.qty-input',function(e){
        var cartId = $(this).data('cart-id');
        var qty = parseInt($(this).val());
        $.ajax({
            url: '{{ url('api/cart/update') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            data: {cart_item_id: cartId, quantity: qty},
            success: function(){
                cartRender();
            }
        });
    });

    // Stripe checkout
    $('#stripe-btn').on('click',function(e){
        e.preventDefault();
        $.ajax({
            url: '{{ url('api/checkout') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            data: {payment_method: 'stripe'},
            success: function(data){
                swal({
                    title: 'Stripe Checkout',
                    text: data.message + '\n\nOrder ID: ' + data.order_id,
                    icon: 'info',
                    buttons: {
                        cancel: 'Cancel',
                        confirm: {text: 'Proceed to Stripe'}
                    }
                }).then(function(value){
                    if(value) window.location.href = data.checkout_url;
                });
            }
        });
    });

    // PayPal checkout
    $('#paypal-btn').on('click',function(e){
        e.preventDefault();
        $.ajax({
            url: '{{ url('api/checkout') }}',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': csrfToken},
            data: {payment_method: 'paypal'},
            success: function(data){
                swal({
                    title: 'PayPal Checkout',
                    text: data.message + '\n\nOrder ID: ' + data.order_id,
                    icon: 'info',
                    buttons: {
                        cancel: 'Cancel',
                        confirm: {text: 'Proceed to PayPal'}
                    }
                }).then(function(value){
                    if(value) window.location.href = data.approval_url;
                });
            }
        });
    });

    // Init
    fetchProducts();
    cartRender();
    
    // Refresh cart every 2 seconds
    setInterval(cartRender, 2000);
});
</script>