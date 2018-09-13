Código desenvolvido para baixar as imagens de um arquivo XML, 
o modelo deve possuir a estrutura básica abaixo ou o código deve ser adaptado para percorrer as tags especificas.

```
<ListingDataFeed>
    <Header>
        <Email>fernandeshenrique15@gmail.com</Email>
        <ContactName>Henrique</ContactName>
    </Header>
    <Listings>
        <Listing>
            <ListingID>100</ListingID>
            <Media>
                <Item medium="image" caption="">
                    https://cdn.pixabay.com/photo/2017/03/29/11/45/dunes-2184976_960_720.jpg
                </Item>
                <Item medium="image" caption="">
                    https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_960_720.jpg
                </Item>
            </Media>
        </Listing>
        <Listing>
            <ListingID>101</ListingID>
            <Media>
                <Item medium="image" caption="">
                    https://cdn.pixabay.com/photo/2014/02/27/16/10/spring-276014_960_720.jpg
                </Item>
                <Item medium="image" caption="">
                    https://cdn.pixabay.com/photo/2014/12/04/14/46/magnolia-trees-556718_960_720.jpg
                </Item>
            </Media>
        </Listing>
    </Listings>
</ListingDataFeed>
```
