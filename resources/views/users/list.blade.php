@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User list
                    <select class="pull-right per-page">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="all">All</option>
                    </select>
                </div>

                <div class="panel-body user-container">
                    @include('users.partials.user')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script>    
    $(document).ready(function() {
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var perPage = $('.per-page').val();
            fetchUsers(url, perPage);
        });

        $('.per-page').on('change', function() {
            var perPage = $('.per-page').val();
            var url = '{{ route("users") }}';
            fetchUsers(url, perPage);
        });
    });

    function fetchUsers(url, perPage) {
        $.ajax({
            url: url,
            data: { perPage: perPage },
            success: function(result) {
                $(".user-container").html(result);
            }
        });
    }
</script>
@endsection
