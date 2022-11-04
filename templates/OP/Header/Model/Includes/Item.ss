<% if $Links %>
    <button class="op-header__toggle-subnav">
        <span>
            $Title
            <% if $Subtitle %>
                <span>$Subtitle</span>
            <% end_if %>
        </span>
    </button>
    <ul>
        <li class="$LinkingMode">
            <a class="$LinkingMode" href="$Link.Link" title="$Title">
                <span>
                    $Title
                    <% if $Subtitle %>
                        <span>$Subtitle</span>
                    <% end_if %>
                </span>
            </a>
        </li>
        <% loop $Links %>
            <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
        <% end_loop %>
    </ul>
<% else %>
    <a class="$LinkingMode" href="$Link.Link" title="$Title">
        <span>
            $Title
            <% if $Subtitle %>
                <span>$Subtitle</span>
            <% end_if %>
        </span>
    </a>
<% end_if %>
