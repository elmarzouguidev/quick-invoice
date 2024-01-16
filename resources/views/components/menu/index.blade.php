<div id="sidebar-menu">
    <ul class="metismenu list-unstyled" id="side-menu">

        <x-menu.item class="menu-title" key="t-menu">
            Menu
        </x-menu.item>

        <x-menu.item>
            <a href="{{ route('home') }}" wire:navigate class="waves-effect">
                <i class="bx bx-calendar"></i>
                <span key="t-{{ route('home') }}">Calendar</span>
            </a>
        </x-menu.item>

        <x-menu.item>

            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bxs-group"></i>
                <span key="t-Contacts">Contacts</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="/abdo" key="t-prospects">
                        <i class="bx bx-user"></i>
                        {{ __('Prospects') }}
                    </a>
                </li>
            </ul>

        </x-menu.item>
    </ul>
</div>
