@extends('layouts.header')

@section('content')
<div class="container">
    <h1>Users FeedBacks</h1>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th data-sort="user_name" class="sortable">User name <i class="fas fa-sort"></i></th>
                <th data-sort="email" class="sortable">Email <i class="fas fa-sort"></i></th>
                <th>Home Page</th>
                <th>Text</th>
                <th>IP address</th>
                <th>User Agent</th>
                <th data-sort="created_at" class="sortable">Created at <i class="fas fa-sort"></i></th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->user_name }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->home_page }}</td>
                    <td>{{ $feedback->text }}</td>
                    <td>{{ $feedback->ip_address }}</td>
                    <td>{{ $feedback->user_agent }}</td>
                    <td>{{ $dateFormated[$feedback->id] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="pagination">
            <?php echo $feedbacks->render(); ?>

        </div>
    </div>

</div>

<script>
    jQuery(document).ready(function($) {

        $(document).ready(function () {

            $('.sortable').on('click', function () {

                order_col = $(this).data('sort');
                order_type = getUrlParameter("order_type") === "desc" ? "asc" : "desc";

                window.location.replace("?order=" + order_col + "&order_type=" + order_type);

            });

            function getUrlParameter(sParam) {
                var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : sParameterName[1];
                    }
                }
            };
        });
    })
</script>





@endsection