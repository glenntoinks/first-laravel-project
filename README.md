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
- title (string) {required}
- description (text) {required}
- status (new {default}, pending user, pending update, resolved, rejected) {required}
- attachments(string) {nullable}
- user id (int) {required} {filled by laravel}
- status changed by (int) {nullable}
- owner id (int) {nullable}
- department id (int) {required}

2. Replies 
- body (text) {required}
- user id (int) {required} {filled by laravel}
- attachments(string) {nullable}
- ticket id (int) {required}

3. Status Changes
- ticket id (int) {required}
- user id (int) {required} {filled by laravel}
- status (new, pending user, pending update, resolved, rejected) {required}

4. Departments
- name (string)