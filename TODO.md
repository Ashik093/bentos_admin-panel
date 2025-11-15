# TODO for Contact Us Model and Table Implementation

- [x] Create migration file for contact_us table with columns: id, name (string), emailPhone (string), description (text), timestamps
- [x] Create ContactUs model in app/Models with fillable fields: name, emailPhone, description
- [x] Modify ContactUsController to create a new ContactUs record instead of sending email
- [x] Run php artisan migrate to create the table
- [ ] Test the /contact/us/mail endpoint to ensure data is stored correctly
