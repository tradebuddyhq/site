# Trade Buddy - Wanted Items & Lost & Found Backend Implementation

## Files Created

### Backend Handlers (Form Processing)
1. **submit_wanted_item.php** - Processes wanted item submissions
   - Validates and uploads images
   - Inserts data into `wanted_items` table
   - Redirects back to wanted-items.php

2. **submit_lost_item.php** - Processes lost item reports
   - Handles image uploads
   - Inserts data into `lost_found_items` table with item_type='Lost'
   - Redirects back to lost-found.php

3. **submit_found_item.php** - Processes found item reports
   - Handles image uploads
   - Inserts data into `lost_found_items` table with item_type='Found'
   - Redirects back to lost-found.php

### Admin Pages
4. **admin_wanted_items.php** - Admin dashboard for wanted items
   - Displays all wanted items with images
   - Shows customer details (parent name, email, year group, contact)
   - Delete functionality with image cleanup
   - Total items counter

5. **admin_lost_found.php** - Admin dashboard for lost & found
   - Displays all lost and found reports with images
   - Color-coded badges (Lost = warm colors, Found = cool colors)
   - Shows location, date, and customer details
   - Delete functionality with image cleanup
   - Statistics: Total reports, Lost count, Found count

### Database Setup
6. **setup_database.php** - Automated database setup script
   - Creates `wanted_items` table
   - Creates `lost_found_items` table
   - Creates `uploads` directory if missing
   - Provides links to all pages after setup

7. **create_tables.sql** - Manual SQL script
   - Same table creation queries for phpMyAdmin
   - Can be imported directly

## Database Tables

### wanted_items
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- customer_id (INT, FOREIGN KEY to customers.id)
- item_name (VARCHAR 255)
- category (VARCHAR 100)
- size_edition (VARCHAR 100, NULLABLE)
- contact_info (VARCHAR 255)
- description (TEXT)
- image (VARCHAR 255, NULLABLE)
- created_at (DATETIME, DEFAULT CURRENT_TIMESTAMP)
```

### lost_found_items
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- customer_id (INT, FOREIGN KEY to customers.id)
- item_type (ENUM: 'Lost', 'Found')
- item_name (VARCHAR 255)
- category (VARCHAR 100)
- location (VARCHAR 255)
- date_reported (DATE)
- contact_info (VARCHAR 255)
- description (TEXT)
- image (VARCHAR 255, NULLABLE)
- created_at (DATETIME, DEFAULT CURRENT_TIMESTAMP)
```

## Setup Instructions

### Option 1: Automatic Setup (Recommended)
1. Navigate to: `http://localhost/your-path/setup_database.php`
2. Wait for tables to be created
3. Delete `setup_database.php` for security
4. Done!

### Option 2: Manual Setup
1. Open phpMyAdmin
2. Select your `trade_buddy` database
3. Go to SQL tab
4. Copy and paste contents of `create_tables.sql`
5. Execute the queries
6. Create an `uploads` folder in your project root with write permissions

## Features Implemented

### Security
- ✓ Session authentication on all pages
- ✓ Prepared statements to prevent SQL injection
- ✓ Image type validation (JPG, PNG, GIF only)
- ✓ Admin-only access to admin pages
- ✓ XSS protection with htmlspecialchars()

### Image Handling
- ✓ Upload to `uploads/` directory
- ✓ Unique filenames (timestamp prefix)
- ✓ File type validation
- ✓ Optional images (forms work without images)
- ✓ Automatic cleanup when items deleted

### Admin Features
- ✓ View all wanted items with customer details
- ✓ View all lost/found reports with location & date
- ✓ Delete items with confirmation
- ✓ Image preview in cards
- ✓ Statistics counters
- ✓ Responsive grid layout

### User Experience
- ✓ Success/error alerts with JavaScript
- ✓ Redirect after submission
- ✓ Form validation (required fields)
- ✓ Clean, modern UI matching existing site design
- ✓ Mobile responsive

## Access URLs

**User Pages:**
- Wanted Items: `wanted-items.php`
- Lost & Found: `lost-found.php`

**Admin Pages:**
- Manage Wanted Items: `admin_wanted_items.php`
- Manage Lost & Found: `admin_lost_found.php`

**Setup:**
- Database Setup: `setup_database.php` (run once, then delete)

## Image Storage
All uploaded images are stored in: `uploads/`
Format: `{timestamp}_{original_filename}`

## Next Steps (Optional Enhancements)

1. Add search/filter functionality to admin pages
2. Add pagination for large datasets
3. Email notifications when items are posted
4. Match suggestions (lost items with found items)
5. Image compression for better performance
6. Mark items as "resolved" instead of deleting
7. User view of their own posted items
8. Public view page (non-logged in users can browse)

## Notes
- All forms already point to correct backend handlers
- Foreign keys ensure data integrity (cascading deletes)
- Image uploads are optional on all forms
- Admin access requires `is_admin = 1` in customers table
