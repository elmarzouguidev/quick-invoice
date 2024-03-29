<div id="sidebar-menu">
    <ul class="metismenu list-unstyled" id="side-menu">

        <x-menu.item class="menu-title" key="t-menu">
            Menu
        </x-menu.item>

        <x-menu.item>
            <a href="{{ route('home') }}" class="waves-effect">
                <i class="bx bx-calendar"></i>
                <span key="t-{{ route('home') }}">Calendar</span>
            </a>
        </x-menu.item>

        <x-menu.item>
            <a href="{{ route('invoices') }}" class="waves-effect">
                <i class="bx bx-calendar"></i>
                <span key="t-">Factures</span>
            </a>
        </x-menu.item>

        <x-menu.item>

            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bxs-group"></i>
                <span key="t-Contacts">Contacts</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">

                <x-menu.item>
                    <a href="/abdo" key="t-Prospects">
                        <i class="bx bx-user"></i>
                        {{ __('Prospects') }}
                    </a>
                </x-menu.item>
                <x-menu.item>
                    <a href="/abdod" key="t-Fournisseurs">
                        <i class="bx bx-user"></i>
                        {{ __('Fournisseurs') }}
                    </a>
                </x-menu.item>
            </ul>

        </x-menu.item>
    </ul>
</div>
