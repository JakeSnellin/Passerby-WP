# Passerby-WP

This repository contains the WordPress backend setup for the Passerby project. It serves as a headless CMS, providing content via WPGraphQL to a Next.js frontend.

---

## Overview

- **WordPress Version:** 6.3 (managed via Composer)  
- **Plugins Installed:**  
  - WPGraphQL  
  - WPGraphQL Gutenberg  
  - Advanced Custom Fields (ACF)  
  - WPGraphQL for ACF  
- **Purpose:**  
  This WordPress instance is used solely as a content management system (CMS) with a GraphQL API, no frontend theme or templates.

---

## Getting Started

### Prerequisites

- PHP 7.4+  
- Composer  
- MySQL or compatible database  
- Node.js (for frontend)  

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/jakesnellin/Passerby-WP.git
   cd Passerby-WP
   ```

2. Install WordPress core and plugins via Composer:
   ```bash
   composer install
   ```

3. Create a `.env` file (copy from `wp-config-sample.php`) and configure your database and environment settings.

4. Set up your WordPress database and run the WordPress installer via browser or CLI.

---

## Development

- Manage content via the WordPress admin dashboard.  
- Use WPGraphQL to query content in the Next.js frontend.

---

## Deployment

This repo can be deployed to any PHP-compatible hosting environment. The frontend repo ([Passerby-NextJS](https://github.com/jakesnellin/Passerby-NextJS)) handles the live site presentation.

---

## Useful Links

- [WPGraphQL](https://www.wpgraphql.com/)  
- [WPGraphQL Gutenberg](https://github.com/pristas-peter/wp-graphql-gutenberg)  
- [Advanced Custom Fields](https://www.advancedcustomfields.com/)  
- [WPGraphQL for ACF](https://github.com/wp-graphql/wp-graphql-acf)  
- [Next.js Frontend Repo](https://github.com/jakesnellin/Passerby-NextJS)  

---

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
