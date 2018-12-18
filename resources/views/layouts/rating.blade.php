<div class="col-md-8 my-3">
    <div class="card">
        <div class="card-header collapse-two">Recently Purchased Items</div>
        <div class="card-body collapsed-two">
            <?php $transactions = auth()->user()->transaction;
                if(isset($transactions) && count($transactions)>0){
            ?>
            <div class="carousel slide my-4" data-ride="carousel" id="rateCarousel">
                <ol class="carousel-indicators">
                    <li data-target="#rateCarousel" data-slide-to="0" class="active"></li>
                    @for($i = 1; $i < count($transactions); $i++)
                        <li data-target="#rateCarousel" data-slide-to="{{$i}}"></li>
                    @endfor
                </ol>
                    
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <div class="card">
                        <img src="/storage/coverProducts/{{$transactions[0]->product->coverProducts}}" alt="{{$transactions[0]->product->productName}}" class="card-img-top">
                        <div class="card-body d-none d-md-block text-center">
                            <h5>{{$transactions[0]->product->productName}}</h5>
                        </div>
                        <div class="form-group card-footer" id="rating-ability-wrapper">
                            <div class="container mx-auto" style="width: 250px; display: block;">
                                <div class="row">
                                    <div class="rating">
                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Good">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    @for($i = 1; $i < count($transactions); $i++)
                    <div class="carousel-item carouselx">
                        <div class="card">
                            <img src="/storage/coverProducts/{{$transactions[$i]->product->coverProducts}}" alt="{{$transactions[$i]->product->productName}}" class="card-img-top">
                            <div class="card-body d-none d-md-block text-center">
                                <h5>{{$transactions[$i]->product->productName}}</h5>
                            </div>
                            <div class="form-group card-footer" id="rating-ability-wrapper">
                                <div class="container mx-auto" style="width: 250px; display: block;">
                                    <div class="row">
                                        <div class="rating">
                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#rateCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#rateCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
            <?php } ?>
        </div>
    </div>
</div>