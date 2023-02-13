
# Cogip Project

This repository contains the Cogip exercice from BeCode bootcamp.

## API Reference

#### Get all companies

```http
  GET /get-companies/
  https://cogip.jonathan-manes.be/get-companies
```
#### Get the latest companies

```http
  GET /get-latest-companies/
  https://cogip.jonathan-manes.be/get-latest-companies
```

#### Get all invoices

```http
  GET /get-invoices/
  https://cogip.jonathan-manes.be/get-invoices
```

#### Get the latest invoices

```http
  GET /get-latest-invoices/
  https://cogip.jonathan-manes.be/get-latest-invoices
  ```


#### Get all contacts

```http
  GET /get-contacts/
  https://cogip.jonathan-manes.be/get-contacts
```

#### Get the latest contacts

```http
  GET /get-latest-contacts/
  https://cogip.jonathan-manes.be/get-latest-contacts
```
## Authors

- [@Aurore Lemaire](https://github.com/aurorelem)
- [@Marnie Benalia](https://github.com/MarnieBenalia)
- [@Virginie Dourson](https://github.com/vdourson2)
- [@Arnaud Volts](https://github.com/voltsn)
- [@Jonathan Manes](https://github.com/manesjonathan)


## Demo

[Live demo](https://cogip.jonathan-manes.be)

## Deployment

To deploy the backend API of this project run

```bash
  php -S localhost:80 -t .
```
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`DB_HOST`

`DB_NAME`

`DB_USER`

`DB_PASS`


## Installation

Install dependencies with composer

```bash
composer install
```

## Screenshots

![App Screenshot](https://cogip.jonathan-manes.be/demo.png)


## Tech Stack

**Client:** React, Sass

**Server:** Php, Tailwind

