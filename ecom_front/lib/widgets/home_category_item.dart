import 'package:ecom_front/screens/products_by_category.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';


class HomeCategoryItem extends StatefulWidget {
  final int categoryId;
  final String categoryIcon;
  final String categoryName;
  HomeCategoryItem(this.categoryId, this.categoryName,this.categoryIcon);
  @override
  _HomeCategoryItemState createState() => _HomeCategoryItemState();
}

class _HomeCategoryItemState extends State<HomeCategoryItem> {
  @override
  Widget build(BuildContext context) {
    return Container(
      padding: EdgeInsets.only(top: 5, bottom: 5,left: 5, right: 5),
      child: InkWell(
        onTap:(){
          Navigator.push(context, MaterialPageRoute(builder: (context) => ProductsByCategory(widget.categoryId,widget.categoryName)));
        },
        child: Card(
          elevation: 0,
          color: Colors.white,
          shape: RoundedRectangleBorder(
            borderRadius: const BorderRadius.all(
              Radius.circular(8.0),
            ),
          ),
          child: Column(
            children: <Widget>[
              Image.network(widget.categoryIcon,width: 120, height: 70,),
              Expanded(
                child: Center(
                  child: Text(
                    widget.categoryName,
                    style: TextStyle(
                      color: Colors.grey,
                      fontSize: 16,
                    ),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
