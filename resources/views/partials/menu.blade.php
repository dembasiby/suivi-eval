<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('organisation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.organisations.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/organisations') || request()->is('admin/organisations/*') ? 'active' : '' }}">
                                <i class="fa-fw far fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.organisation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('strategie_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-binoculars c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.strategie.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('effet_intermediaire_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.effet-intermediaires.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/effet-intermediaires') || request()->is('admin/effet-intermediaires/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-step-forward c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.effetIntermediaire.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('effet_immediat_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.effet-immediats.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/effet-immediats') || request()->is('admin/effet-immediats/*') ? 'active' : '' }}">
                                <i class="fa-fw far fa-times-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.effetImmediat.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('extrant_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.extrants.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/extrants') || request()->is('admin/extrants/*') ? 'active' : '' }}">
                                <i class="fa-fw far fa-arrow-alt-circle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.extrant.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('gaf_i_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gafI.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('resultat_intermediaire_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.resultat-intermediaires.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/resultat-intermediaires') || request()->is('admin/resultat-intermediaires/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-arrow-circle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.resultatIntermediaire.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('probleme_central_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.probleme-centrals.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/probleme-centrals') || request()->is('admin/probleme-centrals/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-exclamation-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.problemeCentral.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('recueil_de_donnee_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.recueilDeDonnee.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('indicateur_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.indicateurs.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/indicateurs') || request()->is('admin/indicateurs/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-tachometer-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.indicateur.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.questions.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
                                <i class="fa-fw far fa-question-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.question.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('type_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.type-questions.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/type-questions') || request()->is('admin/type-questions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-sort c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.typeQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('questionnaire_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.questionnaires.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/questionnaires') || request()->is('admin/questionnaires/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.questionnaire.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('reponse_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reponses.index") }}" class="c-sidebar-nav-link {{ request()->is('admin/reponses') || request()->is('admin/reponses/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-reply-all c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reponse.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>