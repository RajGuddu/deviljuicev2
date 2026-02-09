    /*******************************checkout************************************* */
    document.addEventListener('DOMContentLoaded', function () {
        // Check if preorder button exists on this page
        const preorderBtn = document.getElementById('preorder-btn');
        if (!preorderBtn) return; 

        preorderBtn.addEventListener('click', function () {
            // 1. Check selected address safely
            const selectedAddressEl = document.querySelector('input[name="address_option"]:checked');
            const selectedAddress = selectedAddressEl ? selectedAddressEl.value : null;

            if (!selectedAddress) {
                alert('Please select an address before proceeding.');
                return;
            }

            if (selectedAddress === 'new') {
                alert('Please save your address before proceeding with pre-order.');
                return;
            }

            // 2. Check cart count safely
            const cartCountEl = document.getElementById('cart-count');
            const cartCount = cartCountEl ? parseInt(cartCountEl.innerText || '0') : 0;

            if (cartCount <= 0) {
                alert('Your cart is empty. Please add items before proceeding.');
                return;
            }

            // 3. Show loader if exists
            if (typeof $ !== 'undefined' && $('#ajax-loader').length) {
                $('#ajax-loader').show();
            }

            // 4. Hit checkout URL
            const isConfirmed = confirm('Are you sure you want to place this pre-order?');
            if (!isConfirmed) return;
            let url = window.APP_URL + "/checkout";
            fetch(url, { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify({
                    address: selectedAddress,
                    pre_order: true
                })
            })
            .then(res => res.json())
            .then(resp => {
                if (typeof $ !== 'undefined' && $('#ajax-loader').length) {
                    $('#ajax-loader').hide();
                }

                if (resp.status === 'success') {
                    window.location.href =  window.APP_URL + "/checkout"; 
                } else {
                    alert('Pre-order failed. Please try again.');
                }
            })
            .catch(err => {
                if (typeof $ !== 'undefined' && $('#ajax-loader').length) {
                    $('#ajax-loader').hide();
                }
                console.error(err);
                alert('Something went wrong. Please try again.');
            });
        });
    });

    /*******************************Cocktail filter****************************** */
    document.addEventListener("DOMContentLoaded", function () {

        const searchInput = document.getElementById('searchInput');
        const searchBtn   = document.getElementById('searchBtn');

        if (!searchInput || !searchBtn) {
            return;
        }

        searchBtn.addEventListener('click', function () {
            let q = searchInput.value.trim();

            if (q !== '') {
                window.location.href = window.APP_URL + "/cocktails?q=" + encodeURIComponent(q);
            }
        });

    });

    /*********************************Age Verify********************************* */

    document.addEventListener("DOMContentLoaded", function () {

        const dd = document.querySelector('input[name="dd"]');
        const mm = document.querySelector('input[name="mm"]');
        const yy = document.querySelector('input[name="yy"]');

        if (!dd || !mm || !yy) {
            return;
        }

        dd.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '');

            if (this.value.length === 2) {
                let day = parseInt(this.value);

                if (day < 1) day = 1;
                if (day > 31) day = 31;

                this.value = day.toString().padStart(2, '0');
                mm.focus();
            }
        });

        mm.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '');

            if (this.value.length === 2) {
                let month = parseInt(this.value);

                if (month < 1) month = 1;
                if (month > 12) month = 12;

                this.value = month.toString().padStart(2, '0');
                yy.focus();
            }
        });

        yy.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '');

            if (this.value.length === 4) {
                let year = parseInt(this.value);
                let currentYear = new Date().getFullYear();

                if (year < 1900) year = 1900;
                if (year > currentYear) year = currentYear;

                this.value = year;
            }
        });

    });


    $(document).ready(function () {

        $('.dropdown-item').on('click', function (e) {
            e.preventDefault();
        
            // selected country text
            let country = $(this).text();
        
            // button text change
            $('#selectedCountryText').text(country);
        
            // hidden input fill
            $('#selectedCountry').val(country);
        
            // active class handle
            $('.dropdown-item').removeClass('active');
            $(this).addClass('active');
        });
        
    });
    /*********************************Contact form******************************* */
    const contactForm = document.getElementById('contactForm');
    if(contactForm){
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            
            $("#contactForm").find("small").html('');
            let form = e.target;
            let formData = new FormData(form);
            let url = window.APP_URL + "/save_contact_us";
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let reloadUrl = window.APP_URL + "/thank-you";
            $('#ajax-loader').show();
            fetch(url, {
                method: 'POST',
                // headers: {
                // 'X-CSRF-TOKEN': token
                // },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                $('#ajax-loader').hide();
                if (data.errors) {
                    if (data.errors.uname) {
                        document.getElementById('name-error').innerText = data.errors.uname;
                    }
                    
                    if (data.errors.email) {
                        document.getElementById('email-error').innerText = data.errors.email;
                    }
                    
                    return false;
                }else if(data.message == 'success'){
                    window.location.href = reloadUrl;
                }
            })
            
        });
    }
    /* -------------------------------Cocktail-Creation-------------------------- */
    document.addEventListener('DOMContentLoaded', function () {
        const uploadArea = document.querySelector('.upload-area');
        const fileInput = document.getElementById('fileInput');

        if (!uploadArea || !fileInput) {
            return;
        }

        // Click pe file browse
        uploadArea.addEventListener('click', () => {
            fileInput.click();
        });

        // Drag over
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('drag-active');
        });

        // Drag leave
        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('drag-active');
        });

        // Drop file
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('drag-active');

            fileInput.files = e.dataTransfer.files;
            previewImage(e.dataTransfer.files[0]);
        });

        // Browse se select hone par
        fileInput.addEventListener('change', () => {
            previewImage(fileInput.files[0]);
        });

        function previewImage(file) {
            if (!file) return;

            const allowed = ['image/jpeg','image/png','image/webp'];
            if (!allowed.includes(file.type)) {
                alert('Only JPG, PNG & WEBP allowed');
                fileInput.value = '';
                return;
            }

            uploadArea.innerHTML = `
                <img src="${URL.createObjectURL(file)}"
                    class="img-fluid rounded"
                    style="max-height:200px">
                <p class="text-white mt-2">${file.name}</p>
            `;
        }
    });
    
    /* -----------------------------End Cocktail-Creation------------------------*/
    function updateQty(itemId, change) {
        // alert(itemId); return false;
        $.ajax({
            url: window.APP_URL + "/update-cart-qty",
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                item_id: itemId,
                change: change
            },
            success: function(res) {
                if(res.success) {
                    // location.reload();
                    $('#cart-count').text(res.cart_count).removeClass('d-none');
                    $('#qty-' + itemId).text(res.newQty);
                    // $('#subtotal-' + itemId).text('$' + res.newSubtotal);
                    $('#subtotal').text('$' + res.newTotal);
                    $('#total,#ord-btn-txt').text('$' + res.newTotal);
                    renderPayPalButton(); 
                }else if(res.nostock){
                    toastr.error(res.message);
                } else {
                    alert('Failed to update quantity');
                }
            },
            error: function() {
                alert('Something went wrong!');
            }
        });
    }
    $(document).on('click', '.toggle-password', function () {

        let input = $(this).siblings('input');
        
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            $(this).removeClass('fa-eye-slash').addClass('fa-eye');
        } else {
            input.attr('type', 'password');
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
        }

    });
    $(".addToCart").click(function(){
        let btn = $(this);
        let productBox = btn.closest('.product-actions');
        let wrapper = productBox.find('.qty-wrapper');
        // let stock = parseInt(wrapper.data('stock'));
        let pro_id = $(this).data('pro_id');
        let qty = $(this).data('qty');
        // let qty = parseInt(productBox.find('.qty-value').text());
        let stock = $(this).data('stock');

        let isAddCart = true;
        if(window.MAINTAIN_STOCK == 'Yes'){
            if(stock < 1){
                isAddCart = false;
                toastr.error("Soory, currently unavailable!");
                return false;
            }else if(qty > stock){
                isAddCart = false;
                toastr.error("Soory, only "+stock+ " left!");
                return false;
            }
        }
        if(isAddCart){
            $.ajax({
                url: window.APP_URL + "/add_to_cart",
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                
                data: {
                    pro_id: pro_id,
                    qty: qty,
                    
                },
                success: function(response) {
                    if (response.success) {
                        wrapper.find('.qty-value').text(1);
                        btn.attr('data-qty', 1);

                        $('#cart-count').text(response.cart_count).removeClass('d-none');
                        $("#cart-icon").attr('href',response.checkoutUrl);
                        toastr.success("Product added into cart");
                    }else if(response.stockerr != undefined && response.stockerr == true){
                        wrapper.find('.qty-value').text(1);
                        btn.attr('data-qty', 1);
                        toastr.error(response.message);
                    }else{
                        toastr.error("Soory, Something went wrong!");
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
        
    });
    $(document).on('click', '.increment', function () {
        let wrapper = $(this).closest('.qty-wrapper');
        let qtyEl = wrapper.find('.qty-value');
        let qty = parseInt(qtyEl.text());
        let stock = parseInt(wrapper.data('stock'));

        if(window.MAINTAIN_STOCK == 'Yes'){
            if (qty < stock) {
                qty++;
                qtyEl.text(qty);
                wrapper.next('.addToCart').attr('data-qty', qty);
            } else {
                alert('Stock limit reached');
            }
        }else{
            qty++;
            qtyEl.text(qty);
            wrapper.next('.addToCart').attr('data-qty', qty);
        }
    });

    $(document).on('click', '.decrement', function () {
        let wrapper = $(this).closest('.qty-wrapper');
        let qtyEl = wrapper.find('.qty-value');
        let qty = parseInt(qtyEl.text());

        if (qty > 1) {
            qty--;
            qtyEl.text(qty);

            wrapper.next('.addToCart').attr('data-qty', qty);
        }
    });
/************************************************************************* */
$(document).ready(function () {
    $('.tab-header a').on('click', function () {
        $('.tab-header a.event_active').removeClass('event_active');
        $(this).addClass('event_active');
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 10) {
            $('.header').addClass('fixed-header');
        } else {
            $('.header').removeClass('fixed-header');
        }
    });
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 10) {
            $('.tab-header').addClass('fixed-tab-header');
        } else {
            $('.tab-header').removeClass('fixed-tab-header');
        }

    });
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right", // top-left, bottom-right etc.
        "timeOut": "3000"
    };

});


