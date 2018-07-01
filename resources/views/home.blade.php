@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search for Entitys</div>

                <div class="card-body">
                    @can('read')
                    <div class="alert alert-info" role="alert">
                        Search with <b>:tag: name</b> or just <b>name</b> - eg. <b>:text: Youtube</b> or just <b>Youtube</b>
                    </div>
                    <div class="form-group row">
                        <label for="search" class="col-sm-2 col-form-label">Search for:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="search" name="search" placeholder=":tag: Name">
                        </div>
                    </div>
                    @endcan
                    @cannot('read')
                        <div class="alert alert-danger" role="alert">
                            Get Some permissions
                        </div>
                    @endcannot
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
                $('tbody').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection