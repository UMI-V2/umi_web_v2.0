<!-- Id Shipping Cost Variable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_shipping_cost_variable', 'Id Shipping Cost Variable:') !!}
    {!! Form::select('id_shipping_cost_variable', $shipping_cost_variables, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Business Delivery Services Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_business_delivery_services', 'Id Business Delivery Services:') !!}
    {!! Form::select('id_business_delivery_services', $business_delivery_services, null, ['class' => 'form-control custom-select']) !!}
</div>
