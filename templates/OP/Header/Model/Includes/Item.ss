<% if $Links %>
    <button class="op-header__toggle-subnav">
        <span>
            $Title
            <% if $Subtitle %>
                <span>$Subtitle</span>
            <% end_if %>
        </span>
    </button>
    <ul class="<% if $Content %> has-content<% end_if %>">
        <li class="$LinkingMode">
            <a class="$LinkingMode" href="$Link.Link" title="$Title">
                <strong>$Title</strong>
            </a>
        </li>
        <% loop $Links %>
            <li class="$LinkingMode"><% include OP\Header\Model\Item %></li>
        <% end_loop %>
        <% if $Content %>
            <li class="content">
                $Image
                <span>$Content</span>
            </li>
        <% end_if %>
    </ul>
<% else %>
    <a class="$LinkingMode" href="$Link.Link" title="$Title">
        <% if $Bold %>
            <strong>$Title</strong>
        <% else %>
            <span>
                $Title
                <% if $Subtitle %>
                    <span>$Subtitle</span>
                <% end_if %>
            </span>
        <% end_if %>
    </a>
<% end_if %>
