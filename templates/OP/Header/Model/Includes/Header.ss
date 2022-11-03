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
    <% if $Links %>
        <div class="op-header__links" id="mainMenu">
            <button id="toggleNavigation"><span>Toggle Navigation</span></button>
            <ul>
                <% loop $Links %>
                    <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
                <% end_loop %>
            </ul>
        </div>
    <% end_if %>
</nav>
