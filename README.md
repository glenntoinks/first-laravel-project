# WELCOME

## FIRST LARAVEL  PROJECT

#### PROJECT IDEA
1. User can create a help ticket
2. Admin/Owner can reply on help ticket
3. Admin/Owner can reject or resolve the ticket
4. When Admin updates the ticket, then User will get one notification (via email) that ticket status is updated
5. User can provide ticket subject of the ticket
6. User can provide email/description
7. User can provide files like pdf and image

#### TABLE STRUCTURE
1. Tickets 
- id (int)
- title (string) {required}
- description (text) {required}
- status (new {default}, pending requester, pending responder, resolved, rejected) {required}
- attachments(string) {nullable}
- user id (int) {required} {filled by laravel} /kinsay nag himo
- status changed by (int) {nullable} [TO BE REMOVED]
- owner id (int) {nullable} /kinsay muresolve
- department id (int) {required}
- created at {required} {filled by laravel}
- updated at {required} {filled by laravel}

2. Ticket Replies 
- id (int)
- ticket id (int) {required} {filled by laravel}
- description (text) {required}
- attachments(string) {nullable}
- user id (int) {required} {filled by laravel} /kinsay ni reply
- created at {required} {filled by laravel}
- updated at {required} {filled by laravel}

new -> reply ang requester -> new
new -> reply ang responder -> pending requester / pending responder
pending requester -> reply ang responder -> pending requester / pending responder 
pending responder -> reply ang requester -> pending responder
pending requester -> reply ang responder na resolved na -> resolved

3. Ticket Histories
- id (int)
- ticket id (int) {required} {filled by laravel}
- user id (int) {required} {filled by laravel} /kinsay nag update
- status (text) {required} {filled by laravel}
- owner_id (int) {nullable} {nullable}
- created at {required} {filled by laravel}
- updated at {required} {filled by laravel}

/time to first response (unsa ka dugay from new to first reply of responder) New -> First response sa responder
/requester wait time - total (unsa ka dugay overall naresolve ang ticket) 
/requester wait time - responder (unsa ka dugay na pending update [responder])
/requester wait time - requester (unsa ka dugay na pending user [requester])

4. Departments
- id (int)
- name (string)
- created at {required} {filled by laravel}
- updated at {required} {filled by laravel}

update users with 
is admin
department

update tickets with 
is archived