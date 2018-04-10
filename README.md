# PDF tag for Kirby 2

Add a Kirbytag to [Kirby CMS](https://getkirby.com/) to embed PDFs in Text fields.

## Installation

Copy `pdf.php` inside `tags` to Kirby’s `site/tags/` folder.

## Usage

### Attributes

- **pdf**: Filename of the uploaded PDF.
- **class**: Optional class name. The default is `pdf`.

You can use this KirbyText tag in your text as:

```
(pdf: my-pdf-file.pdf class: my-class)
```

This creates the following code:

```html
<object class="my-class" data=".../my-pdf-file.pdf" type="application/pdf">
  <p>
    This browser doesn’t support PDFs. Please download the PDF to view it: <a href=".../my-pdf-file.pdf" title="PDF herunterladen" target="_blank">Download PDF</a>.
  </p>
</object>
```

### Configuration

To change the fallback text, set this in the configuration:

```php
c::set('pdf.fallback', 'Dieser Browser unterstützt keine PDFs. Bitte laden Sie das PDF herunter, um es anzusehen:');
c::set('pdf.fallback_action', 'PDF herunterladen');
```
