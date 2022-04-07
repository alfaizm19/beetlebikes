{{if data!=''}}
{{each(i,v) data}}
    <aside class="classesblock">
        <aside class="classesblock1">
            <aside class="classeslist">
                <figure><img src="${base_url}${v.category_image}" alt="${v.name}"/></figure>
            </aside>
            <aside class="classescontent">
                <h2>${v.name}</h2>
            </aside>
            <aside class="classeslisttext">
                <h3>${v.name}</h3>
                <ul>
                    {{if schedule_time!=''}}
                    {{each(i,v) schedule_time}}
                                        {{if v.start_time!='' && v.end_time!=''}}
                    <li>${(v.start_time)}&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;-&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;${(v.end_time)}</li>
                                        {{/if}}
                    {{/each}}
                    {{/if}}
                </ul>
                <aside class="classesbtn">
                    <a href="javascript:;" class="line readmore">Read More</a>
                    <a  onclick="class_booking_pop(this);" data-id="${v.id}"  data-category-name="${v.name}" href="javascript:;" data-toggle="modal">Confirm Now</a> </aside>
            </aside>
        </aside>
        <aside class="classescontent1">
		    <span class="close-yoga"></span>
            <h2>${v.name}</h2>
            <p>{{html  v.description}}<p>
        </aside>
    </aside>
{{/each}}
{{/if}}
