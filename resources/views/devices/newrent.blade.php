
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <form id="newrent" class="form-inline" role="form" method="POST" action="/rents/create/{{$device->id}}">
        {{ csrf_field() }}
        <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
            <label for="" class="text-center">Horas</label>
            <div class="input-group custom-number-container">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-info custom-number substract">
                      <i class="fa fa-minus"></i>
                  </button>
                </div>
                <input type="text" class="form-control custom-number" aria-label="..." min="0" value="0" name="hours">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-info custom-number add">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group col-xs-6 col-md-6 col-sm-6 col-lg-6">
            <label for="" class="text-center">Minutos</label>
            <div class="input-group custom-number-container">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-info custom-number substract">
                      <i class="fa fa-minus"></i>
                  </button>
                </div>
                <input type="text" class="form-control custom-number" aria-label="..." min="0" value="{{$device->minimum}}" name="minutes">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-info custom-number add">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>