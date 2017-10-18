@extends("layouts.master")

@section("content")

    <ol class="breadcrumb">
        <li class="active">Statistika</li>
    </ol>

    <div ng-controller="DashboardController as cntrlr" ng-init="cntrlr.initController()">
        <div class="well" ng-cloak>
            <p><b>Vispārīgā informācija:</b></p>
            <p><span class="glyphicon glyphicon-list-alt"></span> Ierakstu: @{{ cntrlr.entity.posts }}</p>
            <p><span class="glyphicon glyphicon-comment"></span> Komentāru: @{{ cntrlr.entity.comments }}</p>
            <p><span class="glyphicon glyphicon-ban-circle"></span> Bloķētu e-pastu: @{{ cntrlr.entity.blocked_emails }}</p>
            <p ng-if="cntrlr.entity.active_user">
                <span class="glyphicon glyphicon-user"></span>
                Aktīvākais lietotājs: @{{ cntrlr.entity.active_user.email }}
                (@{{ cntrlr.entity.active_user.comments }} komentāri)
            </p>
        </div>
    </div>

@endsection