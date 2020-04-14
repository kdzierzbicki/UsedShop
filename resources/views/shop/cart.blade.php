@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')


@if(Session::has('success') )
    <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <div id="charge-message" class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      </div>
      @endif


      
        @foreach($products as $prod)

        
        
        <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true" alt="..." class="img-responsive" >
                    <div class id="caption">
                        <h3>MacBook</h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores error
                            eum inventore officia quis quos totam!</p>
                        <div class="clearfix">
                            <div class="pull-left price">1200zł</div>
                            <a href="{{ route ('product.addToCart', ['id' => $prod->id]) }}"
                               class="btn btn-success pull-right" role="button">Dodaj do koszyka</a>
                        </div>
                    </div>
                </div>
            
                
                <div class="thumbnail">
                    <img src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true" alt="..." class="img-responsive" >
                    <div class id="caption">
                        <h3>HP</h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores error
                            eum inventore officia quis quos totam!</p>
                        <div class="clearfix">
                            <div class="pull-left price">1200zł</div>
                            <a href="{{ route ('product.addToCart', ['id' => $prod->id]) }}"
                               class="btn btn-success pull-right" role="button">Dodaj do koszyka</a>
                        </div>
                    </div>
                </div>

                <div class="thumbnail">
                    <img src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true" alt="..." class="img-responsive" >
                    <div class id="caption">
                        <h3>DELL</h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores error
                            eum inventore officia quis quos totam!</p>
                        <div class="clearfix">
                            <div class="pull-left price">1200zł</div>
                            <a href="{{ route ('product.addToCart', ['id' => $prod->id]) }}"
                               class="btn btn-success pull-right" role="button">Dodaj do koszyka</a>
                        </div>
                    </div>
                </div>
                

                @endforeach

            </div>
            
    </div>
    
@endsection
