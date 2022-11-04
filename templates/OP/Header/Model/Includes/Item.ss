<% if $Links %>
    <button class="op-header__toggle-subnav">
        $Title
        <% if $Subtitle %>
            <span>$Subtitle</span>
        <% end_if %>
    </button>
    <ul>
        <li class="$LinkingMode">
            <a class="$LinkingMode" href="$Link.Link" title="$Title">
                $Title
                <% if $Subtitle %>
                    <span>$Subtitle</span>
                <% end_if %>
            </a>
        </li>
        <% loop $Links %>
            <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
        <% end_loop %>
    </ul>
<% else %>
    <a class="$LinkingMode" href="$Link.Link" title="$Title">
        $Title
        <% if $Subtitle %>
            <span>$Subtitle</span>
        <% end_if %>
    </a>
<% end_if %>
