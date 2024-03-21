# WELCOME

## FIRST LARAVEL  PROJECT

#### PROJECT IDEA
1. User can create a help ticket
2. Admin can reply on help ticket
3. Admin can reject or resolve the ticket
4. When Admin updates the ticket, then User will get one notification (via email) that ticket status is updated
5. User can provide ticket subject of the ticket
6. User can provide files like pdf and image

#### TABLE STRUCTURE
1. Tickets 
- id (int)
- title (string) {required}
- description (text) {required}
- status (new {default}, pending user, pending update, resolved, rejected) {required}
- attachments(string) {nullable}
- user id (int) {required} {filled by laravel}
- status changed by (int) {nullable}
- owner id (int) {nullable}
- department id (int) {required}
- created at {required} {filled by laravel}
- updated at {required} {filled by laravel}

2. Replies 
- id (int)
- body (text) {required}
- user id (int) {required} {filled by laravel}
- attachments(string) {nullable}
- ticket id (int) {required}
- created at {required} {filled by laravel}
- updated at {required} {filled by laravel}

3. Ticket Changes
- id (int)
- ticket id (int) {required} {filled by laravel}
- user id (int) {required} {filled by laravel}
- status (text) {required} {filled by laravel}
- owner_id (int) {nullable} {nullable}
- created at {required} {filled by laravel}
- updated at {required} {filled by laravel}

4. Departments
- id (int)
- name (string)
- created at {required} {filled by laravel}
- updated at {required} {filled by laravel}