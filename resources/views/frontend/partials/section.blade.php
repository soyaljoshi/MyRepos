@foreach ($section as $sectionElement)
      
    <section class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title">
                        <h2><strong>{{$sectionElement->title}}</strong></h2>
                    </div>  
                    <div class="sec-content">   
                        {!! $sectionElement->description !!}
                    </div>
        
                </div>
            </div>
        </div>
    </section>
@endforeach  