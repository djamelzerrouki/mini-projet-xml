<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema" exclude-result-prefixes="xs" version="2.0">

    <xsl:template match="/">
        <html>
            <head>
                <title>exo 3</title>
            </head>
            <body>
                <h1> Livre trouvé:</h1>
                <table align="center" border="1">
                    <tr>
                        <th>Jour</th>
                        <th>Heure Debut</th>
                        <th>Heure Fin</th>
                        <th>Nom Ens</th>
                        <th>Nom Mod</th>
                        <th>Nom Salle</th>


                    </tr>
                    <xsl:for-each select="(//emploi[@promotion = 1]/seance)">
                        <tr>

                            <td>
                                <xsl:value-of select="@jour"/>
                            </td>
                            <td>
                                <xsl:value-of select="@heure_debut"/>
                            </td>
                            <td>
                                <xsl:value-of select="@heure_fin"/>
                            </td>
                            <td>
                                <xsl:value-of select="@nom_ens"/>
                            </td>
                            <td>
                                <xsl:value-of select="@nom_mod"/>
                            </td>
                            <td>
                                <xsl:value-of select="@nom_salle"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>

    </xsl:template>
</xsl:stylesheet>
