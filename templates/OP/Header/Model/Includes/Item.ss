<% if $Children %>
    <button>$Title</button>
    <ul>
        <% loop $Children %>
            <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
        <% end_loop %>
    </ul>
<% else %>
    <a href="$Link" title="$Title.XML">$Title</a>
<% end_if %>
