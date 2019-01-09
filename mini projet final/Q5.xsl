<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema" exclude-result-prefixes="xs" version="1.0">
    <xsl:output method="html" indent="yes"/>
    <xsl:template match="/">
        <html>
            <head>  Q5</head>
            <body>
                <table align="center" border="1">
                    <tr>
                        <th >jour</th>
                        <th>debut</th>
                        <th>fin</th>
                        <th>prof</th>
                        <th>module</th>
                        <th>salle</th>
                    </tr>
                    
                    <xsl:for-each select="/emploi/seance">
                        <tr>
                            <td> <xsl:value-of select="@jour"/> </td>
                            <td> <xsl:value-of select="@debut"/> </td>
                            <td> <xsl:value-of select="@fin"/> </td>
                            <td>  <xsl:value-of select="@prof"/>  </td>
                            <td> <xsl:value-of select="@module"/>  </td>
                            <td>  <xsl:value-of select="@salle"/> </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
    
</xsl:stylesheet>
