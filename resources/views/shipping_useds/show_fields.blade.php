<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $shippingUsed->id }}</p>
</div>

<!-- Id Shipping Cost Variable Field -->
<div class="col-sm-12">
    {!! Form::label('id_shipping_cost_variable', 'Id Shipping Cost Variable:') !!}
    <p>{{ $shippingUsed->id_shipping_cost_variable }}</p>
</div>

<!-- Id Business Delivery Services Field -->
<div class="col-sm-12">
    {!! Form::label('id_business_delivery_services', 'Id Business Delivery Services:') !!}
    <p>{{ $shippingUsed->id_business_delivery_services }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $shippingUsed->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $shippingUsed->updated_at }}</p>
</div>

