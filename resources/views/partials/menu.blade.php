<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('agent_area_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/agents*") ? "c-show" : "" }} {{ request()->is("admin/agent-developer-areas*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-user c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.agentArea.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('agent_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.agents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/agents") || request()->is("admin/agents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.agent.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('client_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.clients.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.client.title') }}
                </a>
            </li>
        @endcan
        @can('board_area_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/boards*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.boardArea.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('board_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.boards.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/boards") || request()->is("admin/boards/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chess-board c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.board.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('board_developer_area_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/state-residents*") ? "c-show" : "" }} {{ request()->is("admin/status-types*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.boardDeveloperArea.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('state_resident_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.state-residents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/state-residents") || request()->is("admin/state-residents/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.stateResident.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('status_type_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.status-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/status-types") || request()->is("admin/status-types/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.statusType.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('customer_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.customers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-money-bill c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.customer.title') }}
                </a>
            </li>
        @endcan
        @can('quote_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.quotes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/quotes") || request()->is("admin/quotes/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-money-bill-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.quote.title') }}
                </a>
            </li>
        @endcan
        @can('email_history_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.email-histories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/email-histories") || request()->is("admin/email-histories/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-envelope-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.emailHistory.title') }}
                </a>
            </li>
        @endcan
        @can('lending_officer_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.lending-officers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/lending-officers") || request()->is("admin/lending-officers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-users-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.lendingOfficer.title') }}
                </a>
            </li>
        @endcan
        @can('listings_area_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/listings*") ? "c-show" : "" }} {{ request()->is("admin/listing-pockets*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.listingsArea.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('listing_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.listings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/listings") || request()->is("admin/listings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.listing.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('listing_pocket_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.listing-pockets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/listing-pockets") || request()->is("admin/listing-pockets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.listingPocket.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('keyword_area_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/keywords*") ? "c-show" : "" }} {{ request()->is("admin/keyword-apps*") ? "c-show" : "" }} {{ request()->is("admin/keyword-prerenders*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-backspace c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.keywordArea.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('keyword_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.keywords.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/keywords") || request()->is("admin/keywords/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-backspace c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.keyword.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('keyword_app_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.keyword-apps.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/keyword-apps") || request()->is("admin/keyword-apps/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.keywordApp.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('keyword_prerender_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.keyword-prerenders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/keyword-prerenders") || request()->is("admin/keyword-prerenders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.keywordPrerender.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('sponsor_area_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/sponsors*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-address-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.sponsorArea.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('sponsor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sponsors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sponsors") || request()->is("admin/sponsors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sponsor.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('contact_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-address-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contact.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }} {{ request()->is("admin/user-alerts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('blog_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/posts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-rss c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.blog.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('post_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.posts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/posts") || request()->is("admin/posts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.post.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('developer_area_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/access-tokens*") ? "c-show" : "" }} {{ request()->is("admin/*") ? "c-show" : "" }} {{ request()->is("admin/notes*") ? "c-show" : "" }} {{ request()->is("admin/states*") ? "c-show" : "" }} {{ request()->is("admin/phones*") ? "c-show" : "" }} {{ request()->is("admin/sms-templates*") ? "c-show" : "" }} {{ request()->is("admin/sms-template-defaults*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.developerArea.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('access_token_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.access-tokens.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/access-tokens") || request()->is("admin/access-tokens/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.accessToken.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('disclaimer_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/disclaimer-groups*") ? "c-show" : "" }} {{ request()->is("admin/disclaimer-types*") ? "c-show" : "" }} {{ request()->is("admin/disclaimer-variables*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.disclaimer.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('disclaimer_group_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.disclaimer-groups.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/disclaimer-groups") || request()->is("admin/disclaimer-groups/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.disclaimerGroup.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('disclaimer_type_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.disclaimer-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/disclaimer-types") || request()->is("admin/disclaimer-types/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.disclaimerType.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('disclaimer_variable_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.disclaimer-variables.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/disclaimer-variables") || request()->is("admin/disclaimer-variables/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.disclaimerVariable.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('note_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.notes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/notes") || request()->is("admin/notes/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.note.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('state_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.states.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/states") || request()->is("admin/states/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-location-arrow c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.state.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('phone_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.phones.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/phones") || request()->is("admin/phones/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-phone c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.phone.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sms_template_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sms-templates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sms-templates") || request()->is("admin/sms-templates/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.smsTemplate.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sms_template_default_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sms-template-defaults.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sms-template-defaults") || request()->is("admin/sms-template-defaults/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.smsTemplateDefault.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('additional_section_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/carriers*") ? "c-show" : "" }} {{ request()->is("admin/charts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.additionalSection.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('carrier_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.carriers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/carriers") || request()->is("admin/carriers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-mobile-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.carrier.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('chart_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.charts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/charts") || request()->is("admin/charts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.chart.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
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