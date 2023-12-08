# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## v1.0.0 (2023-12-09)
### Added
- Add factory method to provide an optional PSR-16 cache
- Add missing class col-span-full
- Allow length and percentage labels for arbitrary sizes
- Add configuration documentation

### Changed
- Refactor validators
- Replace ArbitraryUrlValidator with ArbitraryImageValidator
- Split arbitrary and non-arbitrary validators into distinct validators
- Ssplit touch class group into touch, touch-x, touch-y and touch-pz
- Tests against PHP 8.3

### Fixed
- fix ambiguous arbitrary values

## v0.0.1 (2023-08-03)
### Added
- Initial Release
