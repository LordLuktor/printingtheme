# Changelog

## [2.0.0] - 2025-11-17

### Added - Mobile & Responsive Enhancements

#### Typography
- Implemented fluid typography using CSS clamp() for smooth font scaling across all devices
- Added viewport-based font sizing that responds intelligently to screen width
- Optimized heading and body text sizes for mobile readability

#### Navigation
- Enhanced mobile navigation with 44x44px minimum touch targets
- Improved mobile menu with better spacing, visibility, and box shadows
- Added full-width menu items on mobile for easier tapping
- Implemented vertical stacking for mobile menu items
- Added tablet landscape-specific navigation styles

#### Touch Targets & Buttons
- Ensured all interactive elements meet 44x44px minimum size (WCAG AA compliance)
- Made buttons full-width on mobile for easier interaction
- Enhanced pagination links with proper touch target sizing
- Optimized all clickable elements for touch devices

#### Responsive Breakpoints
- Small phones: < 600px
- Tablets: 600px - 781px
- Tablets landscape: 782px - 1024px
- Desktop: > 1024px
- Large screens: > 1400px
- Added landscape orientation optimizations

#### Forms
- Made all form inputs touch-friendly with 44px minimum height
- Set input font-size to 16px to prevent unwanted zoom on iOS
- Added full-width search forms on mobile with vertical stacking
- Enhanced form focus states with visible outlines
- Optimized textarea with minimum height and vertical resize

#### Images & Media
- Implemented responsive image handling with proper scaling
- Added lazy loading support with fade-in transitions
- Created full-width image support on mobile devices
- Added responsive video embeds with 16:9 aspect ratio preservation
- Optimized image blocks with proper margins for mobile

#### Tables
- Added horizontal scroll for tables on mobile devices
- Implemented touch-friendly scrolling (-webkit-overflow-scrolling)
- Reduced font size and padding for better mobile display
- Added striped table styling for mobile readability

#### Layout & Spacing
- Implemented mobile-first padding system with progressive enhancement
- Added responsive spacing that scales from mobile to desktop
- Created flexible container widths with proper breakpoints
- Added root padding awareness for better alignment

#### Utility Classes
- `.hide-on-mobile` - Hide elements on screens < 768px
- `.show-on-mobile` - Show elements only on mobile
- `.mobile-text-center` - Center text on mobile devices
- `.mobile-text-left` - Left-align text on mobile devices

#### Performance
- Added `prefers-reduced-motion` support for accessibility
- Optimized animations for better mobile performance
- Implemented mobile-first CSS architecture
- Added smooth scrolling with accessibility considerations

#### Accessibility
- Added skip navigation link for keyboard users
- Enhanced focus states for all interactive elements
- Implemented WCAG AA compliant touch targets
- Added proper focus-visible styles for keyboard navigation
- Improved screen reader support

#### WooCommerce
- Optimized product grids for mobile (100% width)
- Made product images and summaries full-width on mobile
- Improved cart table display on small screens
- Hidden product thumbnails on mobile for cleaner layout

#### Technical Improvements
- Added viewport meta tag with proper scaling limits
- Implemented `useRootPaddingAwareAlignments` in theme.json
- Enhanced box-sizing with border-box for all elements
- Added -webkit-font-smoothing for better text rendering
- Prevented horizontal overflow globally

### Changed
- Updated theme version from 1.0.0 to 2.0.0
- Enhanced theme description to highlight mobile-first approach
- Added "accessibility-ready" and "mobile-friendly" tags
- Reorganized CSS with clear section comments
- Improved documentation in README.md

### Fixed
- Fixed horizontal scrolling issues on mobile devices
- Improved touch target accessibility across all devices
- Fixed form zoom issues on iOS devices
- Corrected button hover states to only apply on larger screens
- Fixed responsive column stacking on tablets

## [1.0.0] - 2024-11-01

### Initial Release
- Full Site Editing (FSE) support
- WordPress block theme architecture
- Custom brand colors and typography
- WooCommerce compatibility
- Basic responsive design
