<% require javascript("otago/tepukenga-header:client/dist/js/bundle.js") %>
<nav class="op-header">
    <% if $TopLinks %>
        <div class="op-header__top-links">
            <ul>
                <% loop $TopLinks %>
                    <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
                <% end_loop %>
            </ul>
        </div>
    <% end_if %>
    <div class="op-header__main">
        <a href="/" class="op-header__brand"><span>Home</span></a>
        <% if $Links %>
            <div class="op-header__links" id="mainMenu">
                <% if $SearchForm %><button id="search" class="op-header__toggle op-header__toggle-search"><span>Search</span></button><% end_if %>
                <button id="toggleNavigation" class="op-header__toggle op-header__toggle-navigation"><span>Toggle Navigation</span></button>
                <ul>
                    <% loop $Links %>
                        <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
                    <% end_loop %>
                </ul>
            </div>
        <% end_if %>
    </div>
    <% if $SearchForm %>
        <div class="op-header__search-form">
            $SearchForm
        </div>
    <% end_if %>
</nav>
