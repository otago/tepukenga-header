<% if $Links %>
    <button>$Title</button>
    <ul>
        <li class="$LinkingMode"><a class="$LinkingMode" href="$Link.Link" title="$Title">$Title</a></li>
        <% loop $Links %>
            <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
        <% end_loop %>
    </ul>
<% else %>
    <a class="$LinkingMode" href="$Link.Link" title="$Title">$Title</a>
<% end_if %>
