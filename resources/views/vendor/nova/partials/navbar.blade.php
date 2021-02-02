<div class="flex items-center relative shadow h-header bg-white z-20 px-6">
    <a v-if="'{{ Nova::name() }}'" href="{{ Config::get('nova.url') }}" class="no-underline dim font-bold text-90 mr-6">
        {{ Nova::name() }}
    </a>

    @if (count(Nova::globallySearchableResources(request())) > 0)
        <global-search></global-search>
    @endif

    <dropdown class="ml-auto h-9 flex items-center dropdown-right">
        @include('nova::partials.user')
    </dropdown>
</div>