<% if $Links %>
    <button>$Title</button>
    <ul>
        <% loop $Links %>
            <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
        <% end_loop %>
    </ul>
<% else %>
    <a href="$Link.Link" title="$Title">$Title</a>
<% end_if %>
