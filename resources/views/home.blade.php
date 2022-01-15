@extends('layouts.app')

@section('style')
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="content">
            <div class="title">
                LinkMe
            </div>
            <select name="livesearch" class="form-control livesearch"></select>
        </div>
    </div>
</div>

<script>
    let $q = $('.livesearch');

    $q.select2({
        placeholder: 'Search username',
        ajax: {
            url: "/search",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.username,
                            username_slug: item.username_slug,
                        }
                    })
                };
            },
            cache: true
        }
    });

    $q.on('select2:select', function (e) {
        window.location.href = "/" + e.params.data.username_slug;
    })

</script>

@endsection

