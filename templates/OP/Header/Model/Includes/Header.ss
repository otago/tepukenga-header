<nav>
    <% if $TopLinks %>
        <ul>
            <% loop $TopLinks %>
                <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
            <% end_loop %>
        </ul>
    <% end_if %>
    <% if $Links %>
        <ul>
            <% loop $Links %>
                <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
            <% end_loop %>
        </ul>
    <% end_if %>
</nav>
