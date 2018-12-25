<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    exclude-result-prefixes="xs"
    version="1.0">
    <xsl:output method="html" indent="yes"/>
    <xsl:template match="/">
        <html>
            <head> Mini projet</head>
            <body>
                <xsl:for-each select="//promotion" >
                <h1> promotion : <xsl:value-of select="@niveau"/>
                    <xsl:value-of select="@option"/>  </h1>
                </xsl:for-each>
                    <h2>les Etudiants </h2>   
                <table align="center" border="1">
                  
                    <tr>
                        <th>numInscription</th>
                        <th>nom</th>
                        <th>prenom</th>
                
                    </tr>
                    
                            <xsl:for-each select="//etudiant " >
                        <tr>
                            <td> <xsl:value-of select="@numInscription"/></td>
                            <td> <xsl:value-of select="@nom"/></td>
                            <td> <xsl:value-of select="@prenom"/></td>
                       
                        </tr>    
                    </xsl:for-each>
                    
                </table>
                <h2>les Modules </h2>
                <table align="center" border="1">
                  
                                <tr>
                                    <th>idModule</th>
                                    <th>nomModule</th>
                                </tr>
                                
                                <xsl:for-each select="//module " >
                                    <tr>
                                        <td> <xsl:value-of select="@idModule"/></td>
                                        <td> <xsl:value-of select="@nomModule"/></td>
                                        
                                    </tr>    
                                </xsl:for-each>    
                </table>
            </body>
        </html>
    </xsl:template>
    
</xsl:stylesheet>