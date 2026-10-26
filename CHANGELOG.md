# UBKI Integration Changelog

## 0.5.1
- Pass uppercase `POST` and `GET` methods to `GuzzleHttp\Psr7\Request` in
[Authorization\Provider](./src/Authorization/Provider.php) and [Push\Registry\Service](./src/Push/Registry/Service.php):
guzzlehttp/psr7 2.11+ deprecates lowercase methods, psr7 3 will send them as is.
- Fail tests on deprecations, including the ones silenced by `trigger_deprecation()`.
